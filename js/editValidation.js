function validateForm() {
    var name = document.forms["editTutorInfo"]["name"].value;
    if (name == "") {
      alert("Name must be filled out.");
      document.editTutorInfo.name.focus();
      return false;
    }

    /* var location = document.forms["editTutorInfo"]["location"].value;
    if (location == "") {
      alert("Location must be filled out.");
      document.editTutorInfo.location.focus();
      return false;
    } 

    var email = document.forms["editTutorInfo"]["email"].value;
    if (email == "") {
      alert("Email must be filled out.");
      document.editTutorInfo.email.focus();
      return false;
    } else {
      atPosition = email.indexOf("@");
      dotPosition = email.lastIndexOf(".");

      if (atPosition < 1 || ( dotPosition - atPosition < 2 )) {
          alert("Please enter correct email ID")
          document.editTutorInfo.email.focus();
          return false;
      }
    } */

    var phone = document.forms["editTutorInfo"]["phone"].value;
    if (phone == "") {
      alert("Phone number must be filled out.");
      document.editTutorInfo.phone.focus();
      return false;
    } else if(isNaN(phone)) {
        alert("Please enter a valid Phone Number.");
        document.editTutorInfo.phone.focus();
        return false;
    }

    /* var gender = document.forms["editTutorInfo"]["gender"].value;
    if (gender == "") {
      alert("Gender must be selected.");
      return false;
    } */

    var salaryStart = document.forms["editTutorInfo"]["salaryStart"].value;
    var salaryEnd = document.forms["editTutorInfo"]["salaryEnd"].value;
    if (salaryStart == "" || salaryEnd == "") {
      alert("Salary Range must be filled out.");
      return false;
    }
}