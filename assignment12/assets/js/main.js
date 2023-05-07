// Element
const calculateBtn = document.getElementById('calculateBtn');
const weightInput = document.getElementById('weightInput');
const heightInput = document.getElementById('heightInput');
const result = document.getElementById('result');
const bmiMessage = document.getElementById('bmiMessage');

const bmiResult = () => {
    // Get Data
    const bmiWeightData = weightInput.value;
    const bmiWeight = parseFloat(bmiWeightData * 2.20462);
    // weightInput.value='';

    const bmiheightData = heightInput.value;
    const bmiheight = parseFloat(bmiheightData);
    const squareHeight = bmiheight * bmiheight;
    // heightInput.value='';

    // Calculating Data
    const bmiCalculate = (bmiWeight / squareHeight) * 703;
    result.innerText = bmiCalculate.toFixed(1);

    // Display Message
    if(bmiCalculate<18.5){
        bmiMessage.innerHTML = '<div class="alert alert-warning" role="alert">Opps! You are <b>Underweight!</b></div>';
    } else if(bmiCalculate>18.5 && bmiCalculate<=24.9){
        bmiMessage.innerHTML = '<div class="alert alert-success" role="alert">Wow! Your weight is <b>Normal</b>.</div>';
    } else if(bmiCalculate>24.9 && bmiCalculate<=29.9){
        bmiMessage.innerHTML = '<div class="alert alert-warning" role="alert">Opps! You are <b>Overweight</b>.</div>';
    } else if(bmiCalculate>29.9){
        bmiMessage.innerHTML = '<div class="alert alert-danger" role="alert">You need to contact a nutritionist immediately.</div>';
    }
}
calculateBtn.addEventListener('click', bmiResult);
