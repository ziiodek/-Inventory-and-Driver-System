const ClearStates = () =>{
    let states = document.getElementById("state");
    console.log(states);
   
    var i, L = states.options.length - 1;
   for(i = L; i >= 0; i--) {
    console.log(states);
    states.remove(i);
   }
    
};