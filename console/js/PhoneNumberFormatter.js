const onChangePhoneNumber = (inputBox) =>{
    inputBox.addEventListener('keydown',()=>{
        
        inputBox.value =  phoneNumberFormatter(inputBox.value);
        });

}


const phoneNumberFormatter = (phoneNumber) => {
        if (!phoneNumber) return phoneNumber;
        const number = phoneNumber.replace(/[^\d]/g, '');
        const length = number.length;
        if (length < 4) return number;
        if (length < 7) {
          return `(${number.slice(0, 3)}) ${number.slice(3)}`;
        }
        return `(${number.slice(0, 3)}) ${number.slice(
          3,
          6
        )}-${number.slice(6, 9)}`;
      
            return number;
}