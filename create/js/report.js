const updateBtn = document.getElementById("updateBtn");
const newBtn = document.getElementById("newBtn");
const API = "http://healthkind.is-great.net/create/update/update-existing.php";

updateBtn.setAttribute("data-dismiss", "modal");
newBtn.setAttribute("data-dismiss", "modal");

updateBtn.addEventListener("click", () => {
  console.log("Clicked");
  const xhr = new XMLHttpRequest();
  xhr.open("POST", API, true);
  xhr.getResponseHeader("Content-type", "application/x-www-form-urlencoded");

  xhr.onload = function () {
    if (this.status === 200) {
      console.log(this.responseText);
      alert("Report Updated Successfully.");
      window.location = "../home.php";
    //   document.getElementById("loader").style.display = "none";
    } else {
      console.log("Error");
    }
  };

//   xhr.onprogress = function () {
    
//   }

  let formData = new FormData(document.getElementById("reportForm"));
  document.getElementById("loader").style.display = "flex";
  xhr.send(formData);
});

newBtn.addEventListener("click", () => {
  let hash = "<?php echo $udf1 ?>";

  if (hash === "no_url") {
    alert("Enter details completely");
    return;
  }

  let payuForm = document.forms.payuForm;
  payuForm.submit();
});
