// Global variables
// UI Variables
const cuestionario = document.getElementById('cuestionario');
const generateBtn = document.getElementById('generateBtn');
const preguntas = document.getElementById('preguntas');
const preguntasTotal = document.getElementById('preguntasTotal');
const total = preguntasTotal.value;
const form = document.getElementById('preguntasForm');
const agregar = document.getElementById('agregar');
const enviarRes = document.getElementById('enviarRes');

// Position Variables
let pos = 1;
let examenPos = 1;
let position = 0;
let incorrectPos = 0;

// Check box variables
const check1 = document.getElementById("check1");
const check2 = document.getElementById("check2");
const check3 = document.getElementById("check3");

// Quiz data
const numPreguntas = [];

// Quiz score
let correcto = 0;
let incorrect = 0;

// Generate questions & options for quiz
generateBtn.addEventListener('click', (e) => {
  // Check input fields have value
  if (preguntasTotal && preguntasTotal.value) {
    clearConfig();
    renderForm();
    } else {
    alert('Input fields empty');
  }
})

function storeData() {
  // Get values
  const title = document.getElementById('title').value;
  const input1 = document.getElementById('input1').value;
  const input2 = document.getElementById('input2').value;
  const input3 = document.getElementById('input3').value;
  const value = document.getElementById('valorCorrecto').value;
  // Append to array
  numPreguntas.push([title, input1, input2, input3, value]);
  // Increase position in form
  pos++;
  console.log(pos);
  console.log(preguntasTotal.value);
  // Reset form
  reset();
  console.log(numPreguntas);
}

// Submit quiz data to arrays
agregar.addEventListener('click', (e) => {
  if (pos < preguntasTotal.value) {
    storeData();

} else if (pos == preguntasTotal.value) {
  // Start quiz
  storeData();
  clearForm();
  displayQuiz();
  renderQuiz();

} else {
  // Error Handler
  alert('Display error');
  }
})

// Render quiz
function renderQuiz() {
  const examenTitulo = document.getElementById('examenTitulo');
  const option1 = document.getElementById('option1');
  const option2 = document.getElementById('option2');
  const option3 = document.getElementById('option3');

  // Question Title
  examenTitulo.innerHTML = numPreguntas[position][0];
  // Correct Answer
  option1.innerHTML = numPreguntas[position][1];
  // Incorrect Answers
  option2.innerHTML = numPreguntas[position][2];
  option3.innerHTML = numPreguntas[position][3];
}

// Check answers
function checkAnswer() {
  // Get group name
  choices = document.getElementsByName('choices');
  // Loop through options to check for selected answer
  for(var i = 0; i < choices.length; i++) {
    // Get the value of selected answer
    if(choices[i].checked) {
      choice = choices[i].value;
    }
  }
  // Check if value = correct answer
  if(choice == numPreguntas[position][4]) {
    correcto++;
  } else {
    incorrect++;
  }
  position++;
  examenPos++
 }

 // Sumbit Answer
 enviarRes.addEventListener('click', (e) => {
   if(examenPos >= numPreguntas.length) {
     checkAnswer();
     displayResults();
   } else {
     checkAnswer();
     clearQuiz();
     clearCheckbox();
     renderQuiz();
   }
 })

// Display results from quiz
 function displayResults() {
  cuestionario.innerHTML = '';
   container.innerHTML = '<h5 id="result" class="center">Resultado ' + correcto + '/ ' + numPreguntas.length + '</h5>';
 }

 // Event Listener - Add checked status
 check1.addEventListener('click', (e) => { check1.checked = true; })
 check2.addEventListener('click', (e) => { check2.checked = true; })
 check3.addEventListener('click', (e) => { check3.checked = true; })

 // Clear configuration
 const clearConfig = () => { preguntas.innerHTML = ' ' };
 // Clear form
 const clearForm = () => {  form.classList.add('hide'); }
 // Clear quiz
 const clearQuiz = () => { option1.innerHTML = ''; option2.innerHTML = ''; option3.innerHTML = ''; }
 // Display Quiz
 const displayQuiz = () => { cuestionario.classList.remove('hide'); }
 // Clear checkboxs
 const clearCheckbox = () => { check1.checked = false; check2.checked = false; check3.checked = false; }
 // Render Form
 const renderForm = () => {
   const renderForm = document.getElementById('formatoExamen');
   formatoExamen.classList.remove('hide');
  }

 // Reset form
  function reset() {
    form.reset();
    const labels = [...document.querySelectorAll("label")];
      labels.forEach((label) => {
        label.classList.add('active');
      })
    }


