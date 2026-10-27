const setToken = function(key, value) {
  if(!value) return;

  sessionStorage.setItem(key, value);
}

const getToken = function(key) {
  const value = sessionStorage.getItem(key);

  if(key == 'utm_source') {
    return (value) ? value : 'direct';
  }

  return value;
}

const numberOnly = function (number) {
    return number.replace(/[^0-9]/g, '');
}

export default {
  setToken,
  getToken,
  numberOnly
}