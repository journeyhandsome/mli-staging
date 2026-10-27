<?php

function global_lang_description($lang)
{
  switch($lang) {
    case 'ar':
      return 'Arabic';
    case 'kr':
      return 'Korean';
    case 'ru':
      return 'Russian';
    case 'fr':
      return 'France';
    case 'sp':
      return 'Spanish';
    case 'th':
      return 'Thailand';
    case 'jp':
      return 'Japan';
    case 'por':
      return 'Portugues';
    case 'ch':
      return 'Chinese';
    case 'it':
      return 'Italian';
    case 'tr':
      return 'Turkey';
    case 'de':
      return 'Deutsch';
    case 'tw':
      return 'Taiwanese';
    default:
      return 'English';
  }
}

function global_lang_title($lang)
{
  switch($lang) {
    case 'ar':
        return 'عرب؛ عربيّc';
    break;
    case 'kr':
        return '한국어';
    break;
    case 'ru':
        return 'Pусский';
    break;
    case 'fr':
        return 'Français';
    break;
    case 'sp':
        return 'Español';
    break;
    case 'th':
        return 'ภาษาไทย';
    break;
    case 'jp':
        return '日本語';
    break;
    case 'por':
        return 'Português';
    break;
    case 'ch':
        return '中文(简体)';
    break;
    case 'it':
        return 'Italiano';
    break;
    case 'tr':
        return 'Türkçe';
    break;
    case 'de':
        return 'Deutsch';
    break;
    case 'tw':
        return '中文(繁體)';
    break;
    default:
        return 'English';
  }
}