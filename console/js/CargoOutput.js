function unitValueChange(){

const unitValue__textbox = document.getElementById('unit_value');
unitValue__textbox.addEventListener('input',(event)=>{

let amount = document.getElementById('amount').value;
let unitValue = document.getElementById('unit_value').value;


const cargoOperations = new CargoOperations();
const totalValue = cargoOperations.calculateTotalValue(unitValue,amount);
const totalValue__textbox = document.getElementById('total_value');
const totalValueHidden_textbox = document.getElementById('total_value__hidden');

totalValue__textbox.value = totalValue;
totalValueHidden_textbox.value = totalValue;

});

}


function amountChange(){
    const amount__textbox = document.getElementById('amount');
    amount__textbox.addEventListener('input',(event)=>{
    
    let amount = document.getElementById('amount').value;
    let unitValue = document.getElementById('unit_value').value;
    
    
    const cargoOperations = new CargoOperations();
    const totalValue = cargoOperations.calculateTotalValue(unitValue,amount);
    const totalValue__textbox = document.getElementById('total_value');
    const totalValueHidden_textbox = document.getElementById('total_value__hidden');
   
    totalValue__textbox.value = totalValue;
    totalValueHidden_textbox.value = totalValue;
    
    });


}