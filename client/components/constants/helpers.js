import * as header_first from './header/first';
import * as header_second from './header/second';
import * as header_third from './header/third';

import * as header_lptf_first from './header/lptf_first';
import * as header_lptf_second from './header/lptf_second';
import * as header_lptf_third from './header/lptf_third';

import * as footer_first from './footer/first';
import * as footer_second from './footer/second';
import * as footer_third from './footer/third';



export function getSourceContent(source) {
  switch(source) {
    case 'header_first': return header_first;
    case 'header_second': return header_second;
    case 'header_third': return header_third;
    case 'footer_first': return footer_first;
    case 'footer_second': return footer_second;
    case 'footer_third': return footer_third;
    
    case 'header_lptf_first': return header_lptf_first;
    case 'header_lptf_second': return header_lptf_second;
    case 'header_lptf_third': return header_lptf_third;

  }
}

export function getConstantsMenu(source, lang) {
  //Getting the Resources
  const sourceFile = getSourceContent(source);

  switch(lang) {
    case 'en':
    case undefined:
      return sourceFile['default'];
    default:
      return sourceFile[lang];
  }
}

export default null;