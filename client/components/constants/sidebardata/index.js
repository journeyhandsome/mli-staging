import english from './english';
import japanese from './japanese';
import arabic from './arabic';
import korean from './korean';
import russian from './russian';
import france from './france';
import spanish from './spanish';
import thailand from './thailand';
import portugues from './portugues';
import chinese from './chinese';
import italian from './italian';
import turkey from './turkey';
import deutsch from './deutsch';
import taiwanese from './taiwanese';

const certifications = [
  '/images/sidebar/2022 certifications-1.png'
];

const locations = [
  {
    title: 'WESTWOOD CAMPUS',
    subtitle: '10880 Wilshire Blvd., Suite 122 Los Angeles, CA 90024',
    tel: 'Tel: 310 887 0777',
    link: 'tel:310-887-0777'
  },
  {
    title: 'HOLLYWOOD CAMPUS',
    subtitle: '7080 Hollywood Blvd., Suite 314 Los Angeles, CA 90028',
    tel: 'Tel: 323 870 7102',
    link: 'tel:323-870-7102'
  },
];

function getInfo(lang) {
  switch(lang) {
    case 'jp': return japanese;
    case 'ar': return arabic;
    case 'kr': return korean;
    case 'ru': return russian;
    case 'fr': return france;
    case 'sp': return spanish;
    case 'th': return thailand;
    case 'por': return portugues;
    case 'ch': return chinese;
    case 'it': return italian;
    case 'tr': return turkey;
    case 'de': return deutsch;
    case 'tw': return taiwanese;
    default: return english;
  }
}

export default {
  certifications,
  locations,

  getInfo,
}