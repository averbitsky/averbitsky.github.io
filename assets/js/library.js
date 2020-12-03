// Decrypt email with ROT13 encoding
function decryptEmail(encodedEmail) {

  var encodedString = '<n uers=\"znvygb:' + encodedEmail + '\" ery=\"absbyybj\">rznvy</n>'

  document.write(encodedString.replace(/[a-zA-Z]/g,
    function (c) { return String.fromCharCode((c <= "Z" ? 90 : 122) >= (c = c.charCodeAt(0) + 13) ? c : c - 26); }));
}