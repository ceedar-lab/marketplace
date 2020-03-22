let loginField = document.getElementById('login');
let mailField = document.getElementById('mail');
let passwordField = document.getElementById('password');
let passwordFieldConfirm = document.getElementById('passwordConfirmation');

// true || false
let loginTestResult;
let mailTestResult;
let passTestResult;
let passConfTestResult;


// Liste des message qui vont apparaitre en cas d'erreur de remplissage des champs
let notice = new Array();
notice['login'] = '*Le nom d\'utilisateur doit contenir entre 2 et 25 caractères';
notice['mail'] = '*Veuillez entrer une adresse mail valide';
notice['password'] = '*Le mot de passe doit contenir 6 caractères minimum';
notice['passwordConfirmation'] = '*Les 2 mots de passe doivent correspondre';

// Le champ passe en rouge si les condition ne sont pas remplies
function fieldColor (field, bool) {
    if (bool == false) {
        field.style.backgroundColor = '#fba';
        field.style.border = '0.1rem solid red';
        field.style.color = 'red';
    }
    else {
        field.style.backgroundColor = '';
        field.style.border = '';
        field.style.color = '';
    }
}

// On s'assure que le nom d'utilisateur contient entre 2 et 25 caractères
loginField.addEventListener('blur', function () {
    let loginNotice = document.getElementById('loginNotice');
    if (this.value.length < 2 || this.value.length > 25) {
        loginNotice.innerHTML = notice['login'];
        fieldColor(this, false);        
        loginTestResult = false;        
    }
    else {
        fieldColor(this, true);
        loginNotice.innerHTML = '';
        loginTestResult = true;
    }
});

// On s'assure que l'adresse mail est valide'
mailField.addEventListener('blur', function() {    
    let mailNotice = document.getElementById('mailNotice');
    let regex = /^[\w._-]+@[0-9a-z._-]+\.[a-z]{2,4}$/;
    if (!regex.test(this.value)) {
        fieldColor(this, false);
        mailNotice.innerHTML = notice['mail'];
        mailTestResult = false;
    }
    else {
        fieldColor(this, true);
        mailNotice.innerHTML = '';
        mailTestResult = true;
    }
});

// On s'assure que le mot de passe contient au minimum 6 caractères
passwordField.addEventListener('blur', function() {
    let passwordNotice = document.getElementById('passwordNotice');
    if (this.value.length < 6) {
        passwordNotice.innerHTML = notice['password'];
        fieldColor(this, false);
        passTestResult = false;
    }
    else {
        fieldColor(this, true);
        passwordNotice.innerHTML = '';
        passTestResult = true;
    }
});

// On s'assure que les 2 mots de passe sont identiques
passwordFieldConfirm.addEventListener('blur', function() {
    let passwordConfirmationNotice = document.getElementById('passwordConfirmationNotice')
    if (passwordField.value != this.value) {
        fieldColor(this, false);
        passwordConfirmationNotice.innerHTML = notice['passwordConfirmation'];
        passConfTestResult = false;
    }
    else {
        fieldColor(this, true);
        passwordConfirmationNotice.innerHTML = '';
        passConfTestResult = true;
    }
});

// On teste la force du mot de passe
passwordField.addEventListener('keyup', function() {  
    
    /********** VARIABLES GLOBALES DE LA FONCTION **********/
    
    let colorBandId = ['xx-low', 'x-low', 'low', 'high', 'x-high', 'xx-high'];
    let color = {
        'red': '#FF0000',
        'orange': '#FF8800',
        'yellow': '#FFFF00',
        'greenYellow': '#99FF00',
        'lightGreen': '#55FF00',
        'green': '#00BB00' };
    let passwordOccurences = {};  // On déclare le tableau qui va stocker les caractères identiques du mot de passe pour le calcul du malus 1
    let charactersType = {};  // Stocke le nombre de caractères de chaque type
    
    let bonus1 = passwordField.value.length * 4;  // Longueur du mot de passe
    let bonus2 = 0;  // Présence de minuscules, majuscules, chiffres et caractères spéciaux
    let malus1 = 0;  // Répétition de caractères
    let malus2 = 0;  // Mot de passe composé uniquement de lettres, ou uniquement de chiffres
    let malus3 = 0;  // Caractères de type identique qui se suivent
    let total = 0;  // Force du mot de passe
    
    let lowercaseGlob = /[a-z]/g;
    let uppercaseGlob = /[A-Z]/g;
    let letterGlob = /[a-zA-Z]/g;
    let numberGlob = /[\d]/g;
    let specialCharGlob = /[\W]/g;
    
    let lowercase = /[a-z]/;
    let uppercase = /[A-Z]/;
    let number = /[\d]/;    
    
    /********** DECLARATION DES FONCTIONS **********/
    
    // Tableau du nombre de caractère par type (calcul du bonus 2 et malus 2)
    function charCount(regex) {        
        let count = 0;
        let array = passwordField.value.match(regex);
        if (array != null) {
            count = array.length;            
        }
        charactersType[regex] = count;
    }
    
    // Calcul du bonus 2
    function diversityCheck(type1, type2, type3, type4, coef) {
        if (charactersType[type1] != 0 && (charactersType[type2] || charactersType[type3] || charactersType[type4]) != 0) {
            bonus2 = bonus2 + charactersType[type1] * coef;
        }
    }
    
    // Calcul du malus 1
    function occurenceCheck() {
        for (i=1; i<=passwordField.value.length; i++) {  // On vérifie la valeur des caractères du mot de passe un à un
            let index = i-1;
            let char = passwordField.value.charAt(index);
            if (passwordField.value.lastIndexOf(char, index) == 0 || passwordField.value.lastIndexOf(char, index-1) == -1) {  // On s'assure qu'il s'agit de l'occurence n°1     
                let count = 0;
                let position = passwordField.value.indexOf(char);
                while (position != -1) {                
                    count++;
                    position = passwordField.value.indexOf(char, position+1);
                }
                passwordOccurences[char] = count;
            }       
        }
        for (let char in passwordOccurences) {
            let nb = passwordOccurences[char];
            malus1 = malus1 - nb*(nb-1);
        }
    }
    
    // Calcul du malus 2
    function repeteCheck(type1, type2, type3) {
        if (charactersType[type1] != 0 && (charactersType[type2] || charactersType[type3]) == 0) {
            malus2 = -passwordField.value.length;
        }
    }
    
    // Calcul du malus 3
    function followingCharCheck(regex) {
        for (i=0; i<passwordField.value.length; i++) {
            if (regex.test(passwordField.value.charAt(i)) == true && regex.test(passwordField.value.charAt(i+1)) == true) {
                let count = 0;
                count = count+1;
                malus3 = malus3 + count * -2;
            }
        }
    }
    
    // Selection des bandes et options de couleurs a appliquer
    function colorBand(num, color) {        
        let i = 0;
        let colorBandPath = document.getElementById(colorBandId[i]);
        for (i=0; i<num; i++) {
            document.getElementById(colorBandId[i]).style.backgroundColor = color;
            document.getElementById(colorBandId[i]).style.borderColor = color;
        }
        for (i=num; i<colorBandId.length; i++) {
            document.getElementById(colorBandId[i]).style.backgroundColor = '';
            document.getElementById(colorBandId[i]).style.border = '';
        }    
    }
    
    // Options d'application des couleurs
    function colorize() {
        total = bonus1 + bonus2 + malus1 + malus2 + malus3;
        if (passwordField.value.length >= 6) {
            fieldColor(passwordField);
            passwordNotice.innerHTML = '';
        }
        if (passwordField.value.length < 6) {
            for (i=0; i<colorBandId.length; i++) {
                document.getElementById(colorBandId[i]).style.backgroundColor = '';
                document.getElementById(colorBandId[i]).style.border = '';
            }
        }        
        else if (total <= 20) {
            colorBand(1, color.red);
        }
        else if (total < 35) {
            colorBand(2, color.orange);
        }
        else if (total < 50) {
            colorBand(3, color.yellow);
        }
        else if (total < 60) {
            colorBand(4, color.greenYellow);
        }
        else if (total < 75) {
            colorBand(5, color.lightGreen);
        }
        else if (total >= 75) {
            colorBand(6, color.green);
        }
    }    
    
    /********** INITIALISATION **********/
    
    charCount(uppercaseGlob);
    charCount(lowercaseGlob);
    charCount(letterGlob);
    charCount(numberGlob);
    charCount(specialCharGlob);
    
    diversityCheck(lowercaseGlob, numberGlob, specialCharGlob, uppercaseGlob, 2);
    diversityCheck(uppercaseGlob, lowercaseGlob, numberGlob, specialCharGlob, 2);
    diversityCheck(specialCharGlob, uppercaseGlob, lowercaseGlob, numberGlob, 6);
    diversityCheck(numberGlob, specialCharGlob, uppercaseGlob, lowercaseGlob, 4);
    
    occurenceCheck();
    
    repeteCheck(letterGlob, numberGlob, specialCharGlob);
    repeteCheck(numberGlob, letterGlob, specialCharGlob);
        
    followingCharCheck(uppercase);
    followingCharCheck(lowercase);
    followingCharCheck(number);
    
    colorize();    
    
    /********** DEBUGGING **********/
    
    /*console.table(charactersType);    
    console.table(passwordOccurences);
    
    console.log('Bonus 1 : ' + bonus1);
    console.log('Bonus 2 : ' + bonus2);
    console.log('Malus 1 : ' + malus1);
    console.log('Malus 2 : ' + malus2);
    console.log('Malus 3 : ' + malus3)
    console.log('Total : ' + total);
    console.log('---------------');*/
});

// Valide l'envoi du formulaire
document.getElementById('registerForm').addEventListener('submit', function(event) {   
    if ((loginTestResult && mailTestResult && passTestResult && passConfTestResult) == true) {
    } 
    else {
        alert('Vous devez remplir correctement tous les champs');
        event.preventDefault();
    }    
});