const { spawnSync } = require('child_process')
const fs = require('fs')
const path = require('path')

const HOSTNAME = 'https://mliesl.edu'
const REPO_ROOT = path.resolve(__dirname, '../..')
const CLIENT_DIR = path.resolve(__dirname, '..')

const PAGE_ROUTES = {
  '/':            'client/content/home/en.json',
  '/about':       'client/content/about/en.json',
  '/feature':     'client/content/feature/en.json',
  '/company':     'client/content/company/en.json',
  '/westwood':    'client/content/westwood/en.json',
  '/hollywood':   'client/content/hollywood/en.json',
  '/careers':     'client/content/careers/en.json',
  '/price':       'client/content/price/en.json',
  '/price-auto':  'client/content/price-auto/en.json',
  '/how-to-apply':'client/content/how-to-apply/en.json',
  '/admission':   'client/content/admission/en.json',
  '/material':    'client/content/material/en.json',
  '/contact':     'client/content/contact/en.json',
  '/programs':    'client/content/programs/en.json',
}

function extractPdfLinks(src) {
  const baseMatch = src.match(/const file = "([^"]+)"/)
  const base = baseMatch ? baseMatch[1] : '/documents/'
  const links = []

  // link: file + 'xxx.pdf'
  const concatRe = /link:\s*file\s*\+\s*'([^']+\.pdf)'/g
  let m
  while ((m = concatRe.exec(src)) !== null) links.push(base + m[1])

  // link: '/xxx.pdf'  (direct string)
  const directRe = /link:\s*'([^']+\.pdf)'/g
  while ((m = directRe.exec(src)) !== null) links.push(m[1])

  return links
}

function getPdfLinks() {
  const footerDir = path.join(CLIENT_DIR, 'components/constants/footer')
  const second = fs.readFileSync(path.join(footerDir, 'second/english.js'), 'utf8')
  const third  = fs.readFileSync(path.join(footerDir, 'third/english.js'),  'utf8')
  return [...new Set([...extractPdfLinks(second), ...extractPdfLinks(third)])]
}

function gitLastModified(file) {
  const result = spawnSync('git', ['log', '-1', '--format=%as', '--', file], {
    cwd: REPO_ROOT,
    encoding: 'utf8',
  })
  return (result.stdout || '').trim() || null
}

function buildXML() {
  const entries = []

  for (const [url, file] of Object.entries(PAGE_ROUTES)) {
    const lastmod = gitLastModified(file)
    entries.push(`  <url><loc>${HOSTNAME}${url}</loc>${lastmod ? `<lastmod>${lastmod}</lastmod>` : ''}</url>`)
  }

  for (const url of getPdfLinks()) {
    const lastmod = gitLastModified(`client/static${url}`)
    entries.push(`  <url><loc>${HOSTNAME}${url}</loc>${lastmod ? `<lastmod>${lastmod}</lastmod>` : ''}</url>`)
  }

  return [
    '<?xml version="1.0" encoding="UTF-8"?>',
    '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">',
    ...entries,
    '</urlset>',
  ].join('\n')
}

function sitemapMiddleware(req, res, next) {
  if (req.url !== '/sitemap.xml') return next()
  res.setHeader('Content-Type', 'application/xml; charset=utf-8')
  res.end(buildXML())
}

sitemapMiddleware.buildXML = buildXML

module.exports = sitemapMiddleware
