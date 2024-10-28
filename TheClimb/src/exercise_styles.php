<?php
// styles.php
header("Content-type: text/css; charset: UTF-8");
?>
<?php include 'data/exerciseBE/exercise_backend.php'; ?>
<style>
  /* Your CSS rules go here */
  @import url("https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;700&display=swap");

  body {
    font-family: "Ubuntu", sans-serif;
    background-color: #4a4a4a;
  }

  h1,
  h2,
  h3,
  p {
    font-family: 'Ubuntu', sans-serif;
  }

  html,
  body {
    margin: 0;
    padding: 0;
  }

  .header {
    width: 100vw;
    height: 100px;
    background-color: #163f8c;
    display: flex;
    align-items: center;
    color: #ffffff;
    /* Set the text color, if needed */
    border: 0px;
    padding: 0px;
    top: 0;
    left: 0;
  }

  .header .page-name {
    align-content: center;
    align-items: center;
    display: grid;
    /*padding: 0 18%;*/
    margin: auto;
  }

  .navigation {
    background: #d9d9d9;
    width: 100vw;
    left: 0;
    list-style: none;
    padding: 0;
    display: flex;
  }

  .navigation a {
    text-decoration: none;
    color: black;
    font-size: 24px;
  }

  .navigation ul {
    list-style: none;
    padding: 1% 10%;
    margin: 0;
    display: flex;
    /* Set the display property to flex */
    align-items: stretch;
    /* Default */
    justify-content: space-between;
    width: 100%;
  }

  .navigation li {
    display: block;
    /* Display list items as horizontal blocks */
    flex: 0 1 auto;
    /* Default */
    list-style-type: none;
  }

  .title-container {
    max-height: max-content;
  }

  .title {
    /*max-font-size: ;*/
    /*min-font-size: ;*/
    font-size: 70px;
    padding: 0 20px;
    min-width: max-content;
    max-height: 150px;
    vertical-align: top;
    display: inline;
  }

  .title a {
    color: white;
    text-decoration-line: none;
  }

  .container {
    height: 80%;
    display: contents;
  }

  .logo_image {
    height: 100%;
    margin: initial;
  }

  .page-name {
    align-content: center;
  }

  .container img {
    max-width: 50%;
    max-height: 75%;
    height: auto;
    /* Maintain the aspect ratio of the image */
    display: block;
    /* Remove any default inline spacing */
  }

  /*------------------------------------------------------------------------------------------*/
  .subBar {
    margin-top: 25px;
    margin-left: 20px;
    margin-right: 20px;
    display: flex;
    justify-content: space-evenly;
  }

  .date {
    background-color: #d9d9d9;
    padding: 1%;
    padding-top: 5px;
    border-radius: 10px;
    color: #163f8c;
    padding-bottom: 5px;
  }

  .actualdate {
    font-weight: bold;
    font-size: x-large;
  }

  .currentdate {
    font-weight: bolder;
    font-size: xx-large;
    width: fit-content;
    margin: 0;
    display: inline-block;
  }

  .arrowleft {
    margin-left: 35px;
    margin-right: 5px;
    /* Add spacing between buttons */
    background-color: white;
    border-radius: 25px;
    border-color: #000;
    font-size: 15px;
    color: #163f8c;
  }

  .arrowright {
    background-color: white;
    border-radius: 25px;
    border-color: #000;
    font-size: 15px;
    color: #163f8c;

  }
  .arrowright:hover {
    background-color: #163f8c;
    color: #d9d9d9;
    cursor: pointer;
  }

  .add {
    background-color: #d9d9d9;
    border-radius: 25px;
    border-color: #000;
    font-size: 15px;
    color: #163f8c;
    font-weight: bolder;
  }

  .add:hover {
    background-color: #163f8c;
    color: #d9d9d9;
    cursor: pointer;

  }


  /*------------------------------------------------------------------------------------------*/
  /* modal information*/

  .closeModal {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    border: none;
    background: white;
  }

  .closeModal:hover {
    color: #000;
    text-decoration: none;
    cursor: pointer;
  }

  .ExerciseModal {
    width: 40%;
    border: none;
    background: #fefefe;
    margin: auto;

  }

  .CardioModal {
    width: 60%;
    border: none;
    background: #fefefe;
    margin: auto;

  }

  .goalmodal {
    width: 60%;
    border: none;
    background: #fefefe;
    margin: auto;

  }

  .labelStyle {
    font-size: 160%;
    display: inline-block;
  }

  select {
    display: inline-block;
    margin-left: 5%;
    font-size: 120%;
  }

  .inputStyle {
    width: 35%;
    display: inline-block;
    margin-left: 5%;
    font-size: 120%;
  }

  .Menu {
    float: right;
  }

  .MenuButton {
    background-color: #163f8c;
    color: white;
    padding: 0rem 1rem;
    text-align: center;
    text-decoration: none;
    font-size: 0.9rem;
    border-radius: 8px;
    font-size: 100%
  }

  .exerciseForm {
    margin-left: 10px;
  }




  /*------------------------------------------------------------------------------------------*/
  .contentEx {
    align-items: stretch;
    justify-content: space-evenly;
    display: flex;
    margin-top: 50px;
    margin-left: 2%;
    margin-right: 2%;
  }

  .exerciseTable {
    height: 500px;
    overflow-y: auto;
    background-color: #d9d9d9;
    border-radius: 20px;
    margin-right: 2%;
  }

  table {
    width: 35%;
    background-color: #d9d9d9;
    color: #163f8c;
    font-size: 20px;
    border-collapse: collapse;
  }

  tbody {
    vertical-align: top;
  }

  th {
    color: #163f8c;
    font-size: 30px;
    padding: 8px;
    position: sticky;
    top: 0;
    background-color: #d9d9d9;
    /* Header background color */
  }

  tr {
    height: 20px;
  }

  td {
    height: 20px;
    padding: 8px;
  }

  /*------------------------------------------------------------------------------------------*/
  .cardio_container {
    text-align: center;
    background-color: #d9d9d9;
    border-radius: 20px;
    padding: 15px;
  }

  .cardioTitle {
    font-weight: bold;
    font-size: 22px;
  }

  .imageContainer {
    position: relative;
  }

  .road {
    height: 304px;
    background: black;
  }

  .roadstrip1 {
    position: absolute;
    width: 10px;
    height: 96px;
    left: 50%;
    top: 35px;
    background: #FFC805;
  }

  .roadstrip2 {
    width: 10px;
    height: 97px;
    left: 50%;
    top: 175px;
    position: absolute;
    background: #FFC805;
  }

  .RoadOverlay {
    position: absolute;
    left: 2px;
    top: 2px;
    height:
      <?php echo $desktopcovpx ?>
    ;
    width: 97.5%;
    background: white;

  }

  .KEY {
    position: relative;
    top: 20px;
    padding-top: 20px;
  }

  .blackbox {
    background-color: black;
    width: 10px;
    height: 10px;
    margin-right: 10px;
  }

  .goal {
    display: inline;
    padding-left: 1px;
  }

  /*------------------------------------------------------------------------------------------*/

  .muscle_container {
    position: relative;
    text-align: center;
    background-color: #d9d9d9;
    border-radius: 20px;
    padding: 15px;
    margin-right: 2%;
  }

  .muscleTitle {
    font-weight: bold;
    font-size: 22px;
    padding-left: 130px;
    padding-right: 130px;
  }

  .key {
    position: relative;
    top: 320px;
  }

  .keyline1 {
    position: absolute;
    left: 30%;
  }

  .keyline2 {
    position: absolute;
    left: 30%;
    top: 25px;
  }

  .bluebox {
    background-color: #163f8c;
    width: 10px;
    height: 10px;
    margin-right: 10px;
  }

  .greybox {
    background-color: #a3a3a3;
    width: 10px;
    height: 10px;
    margin-right: 10px;
  }

  @media screen and (max-width: 980px) {
    /* Styles for screens up to 1100px wide */

    body {
      font-family: "Ubuntu", sans-serif;
      background-color: #4a4a4a;
    }

    h1,
    h2,
    h3,
    p {
      font-family: 'Ubuntu', sans-serif;
    }

    html,
    body {
      margin: 0;
      padding: 0;
    }

    .header {
      width: 100vw;
      height: 100px;
      background-color: #163f8c;
      display: flex;
      align-items: center;
      color: #ffffff;
      /* Set the text color, if needed */
      border: 0px;
      padding: 0px;
      top: 0;
      left: 0;
    }

    .header .page-name {
      align-content: center;
      align-items: center;
      display: grid;
      /*padding: 0 18%;*/
      margin: auto;
    }

    .navigation {
      background: #d9d9d9;
      width: 100vw;
      left: 0;
      list-style: none;
      padding: 0;
      display: flex;
    }

    .navigation a {
      text-decoration: none;
      color: black;
      font-size: 24px;
    }

    .navigation ul {
      list-style: none;
      padding: 1% 10%;
      margin: 0;
      display: flex;
      /* Set the display property to flex */
      align-items: stretch;
      /* Default */
      justify-content: space-between;
      width: 100%;
    }

    .navigation li {
      display: block;
      /* Display list items as horizontal blocks */
      flex: 0 1 auto;
      /* Default */
      list-style-type: none;
    }

    .title-container {
      max-height: max-content;
    }

    .title {
      /*max-font-size: ;*/
      /*min-font-size: ;*/
      font-size: 70px;
      padding: 0 20px;
      min-width: max-content;
      max-height: 150px;
      vertical-align: top;
      display: inline;
    }

    .container {
      height: 80%;
      display: contents;
    }

    .logo_image {
      height: 100%;
      margin: initial;
    }

    .page-name {
      align-content: center;
    }

    .container img {
      max-width: 50%;
      max-height: 75%;
      height: auto;
      /* Maintain the aspect ratio of the image */
      display: block;
      /* Remove any default inline spacing */
    }

    /*------------------------------------------------------------------------------------------*/
    .subBar {
      display: flex;
      flex-wrap: wrap;
      margin-top: 60px;
      margin-left: 20px;
      margin-right: 20px;
    }

    .date {
      background-color: #d9d9d9;
      padding-left: 7%;
      padding-right: 5%;
      border-radius: 10px;
      color: #163f8c;
      font-size: 30px;
      margin-left: 100px;
      margin-right: 100px;
      width: 700px;
      display: flex;
      align-items: center;
    }

    .currentdate {
      font-weight: bolder;
      font-size: xxx-large;
      width: fit-content;
      margin: 0;
      display: inline-block;
    }

    .actualdate {
      font-weight: bold;
      font-size: xxx-large;
    }

    .arrowleft {
      margin-left: 100px;
      margin-right: 5px;
      background-color: white;
      border-radius: 15px;
      border-color: #000;
      font-size: 30px;
      color: #163f8c;
      height: 40px;
    }

    .arrowright {
      background-color: white;
      border-radius: 25px;
      border-color: #000;
      font-size: 30px;
      color: #163f8c;
      height: 40px;

    }
    .arrowright:hover {
    background-color: #163f8c;
    color: #d9d9d9;
    cursor: pointer;
  }

    .add {
      background-color: #d9d9d9;
      border-radius: 25px;
      border-color: #000;
      font-size: 30px;
      color: #163f8c;
      margin-top: 30px;
      height: 50px;
    }

    /*------------------------------------------------------------------------------------------*/
    .closeModal {
      color: #aaaaaa;
      float: right;
      font-size: 50px;
      font-weight: bold;
      border: none;
      background: white;
    }

    .closeModal:hover {
      color: #000;
      text-decoration: none;
      cursor: pointer;
    }

    .ExerciseModal {
      width: 80%;
      border: none;
      background: #fefefe;
      margin: auto;

    }

    .CardioModal {
      width: 80%;
      border: none;
      background: #fefefe;
      margin: auto;

    }

    .goalmodal {
      width: 80%;
      border: none;
      background: #fefefe;
      margin: auto;

    }

    .labelStyle {
      font-size: 300%;
      display: inline-block;
    }

    select {
      display: inline-block;
      margin-left: 5%;
      font-size: 190%;
    }

    .inputStyle {
      width: 50%;
      display: inline-block;
      margin-left: 5%;
      font-size: 190%;
    }

    .Menu {
      float: right;
    }

    .MenuButton {
      background-color: #163f8c;
      color: white;
      padding: 0rem 1rem;
      text-align: center;
      text-decoration: none;
      font-size: 0.9rem;
      border-radius: 8px;
      font-size: 150%
    }

    .exerciseForm {
      margin-left: 10px;
      padding: 10px;
    }

    /*------------------------------------------------------------------------------------------*/
    .contentEx {

      justify-content: center;
      display: flex;
      margin-top: 50px;
      margin-left: 2%;
      margin-right: 2%;
      flex-wrap: wrap;
    }

    .exerciseTable {
      max-height: 464px;
      width: 700px;
      overflow-y: auto;
      background-color: #d9d9d9;
      border-radius: 20px;
      margin-right: 0px;
      margin-bottom: 30px;
      margin-right: 0;
    }

    table {
      width: 35%;
      background-color: #d9d9d9;
      color: #163f8c;
      font-size: 40px;
      border-collapse: collapse;
    }

    tbody {
      vertical-align: top;
    }

    th {
      color: #163f8c;
      font-size: 44px;
      padding: 8px;
      position: sticky;
      top: 0;
      background-color: #d9d9d9;
      /* Header background color */
    }

    tr {
      height: 20px;
    }

    td {
      height: 20px;
      padding: 8px;
    }

    /*------------------------------------------------------------------------------------------*/

    .cardio_container {
      text-align: center;
      background-color: #d9d9d9;
      border-radius: 20px;
      padding: 15px;
      margin-top: 30px;
    }

    .muscle_container {
      text-align: center;
      background-color: #d9d9d9;
      border-radius: 20px;
      padding: 0px;
      width: 700px;
      height: 570px;
      margin-right: 10%;
      margin-left: 10%;
    }

    .cardioTitle {
      font-weight: bold;
      font-size: 35px;
      margin-top: 10px;
    }

    .imageContainer {
      position: relative;
      width: 670px;

    }


    .road {
      height: 200px;
      background: black;
      width: 604px;
      margin-left: 35px;
    }

    .roadstrip1 {
      position: absolute;
      width: 150px;
      height: 15px;
      left: 130px;
      top: 85px;
      background: #FFC805;
    }

    .roadstrip2 {
      width: 150px;
      height: 15px;
      left: 380px;
      top: 85px;
      position: absolute;
      background: #FFC805;
    }

    .RoadOverlay {
      position: absolute;
      left: 37px;
      top: 2px;
      height: 196px;
      width:
        <?php echo $mobilecovpx ?>
      ;
      background: white;
    }

    .KEY {
      position: relative;
      font-size: 30px;
      top: 0px;
    }

    .blackbox {
      background-color: black;
      width: 10px;
      height: 10px;
      margin-right: 10px;
    }

    .goal {
      display: inline;
      padding-left: 1px;
    }

    /*------------------------------------------------------------------------------------------*/

    .muscleTitle {
      font-weight: bold;
      font-size: 35px;
      padding-left: 130px;
      padding-right: 130px;
    }

    .body_diagrams {
      display: inline;
      justify-content: space-evenly;
    }

    .bod {
      width: flex;
      height: 300px;
    }

    .key {
      position: relative;
      font-size: 25px;
      top: 360px;
    }

    .keyline1 {
      position: absolute;
      left: 30%;
    }

    .keyline2 {
      position: absolute;
      left: 30%;
      top: 25px;
    }

    .bluebox {
      background-color: #163f8c;
      width: 10px;
      height: 10px;
      margin-right: 10px;
    }

    .greybox {
      background-color: #a3a3a3;
      width: 10px;
      height: 10px;
      margin-right: 10px;
    }
  }
</style>