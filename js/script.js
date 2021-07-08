fetch("./header1.html")
  .then((response) => {
    return response.text();
  })
  .then((data) => {
    document.querySelector("header").innerHTML = data;
  });

fetch("./footer.php")
  .then((response) => {
    return response.text();
  })
  .then((data) => {
    document.querySelector("footer").innerHTML = data;
  });

function regPic(fileToUpload) {
  const playerHand = document.querySelector(".pic");
  playerHand.src = fileToUpload;
}

///////////////////////////////////////
function cPass(cP) {
  if (cP === "") {
    return "Current Password Needed";
  } else {
    return "*";
  }
}

function nPass(cP, nPass) {
  if (nPass === "") {
    return "Need Password Needed";
  } else if (cP == nPass) {
    return "Current Pass and New Pass should be not same";
  } else {
    return "*";
  }
}
function rPass(nP, cPass) {
  if (cPass === "") {
    return "Repeat Password Needed";
  } else if (nP != nPass) {
    return "New Pass and Repeat Pass should be  same";
  } else {
    return "*";
  }
}
