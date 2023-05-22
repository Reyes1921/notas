let mensaje: string = 'Hola Mundo';
console.log(mensaje);

//Varaibles

let libro: string = 'La culpa es de la vaca';

let numeroEntero: number = 123456789;

let numeroDecimal: number = 123.9999;

let verdadero: boolean = true;

//Arrays

let numerosArray : number[] = [1,2,3,4,5,6,7];

let animalesAarray: string[] = ['perro', 'gato','pato', 'vaca'];

//Crear tipos de datos propios

type mixto = string | number | boolean | string[];

let datosMixtos: mixto[] = [1,2,3,4,'Hola','Chao',false];

//Diccionario

let jugadores: { [key: number] : string} ={
    7: 'Cristiano',
    10: 'Messi'
};

//Constantes

const pi: number = 3.14

// Operadores

console.log(5+2);
console.log(5-2);
console.log(5*2);
console.log(5/2);

//Comparacion

//En typeScript no se usa el === ya que todos las variables deben de ser del mismo tipo ni tampoco se usa !=
console.log(5==5);
console.log(5<2);
console.log(5>=2);
console.log(5/2);

//Operadores Logicos

console.log(true || true);
console.log(true || false);
console.log(false || true);
console.log(false|| false);

//Condicionales

if(true){
    console.log('Verdadero');
}else if(false){
    console.log('Falso');
}else{
    console.log('Empty');
}

let color: string = 'Verde';
switch(color){
    case 'Verde':
        console.log('Exito');
        break;
        case 'Amarillo':
        console.log('Advertencia');
        break;
        default:
        console.log('Error');
        break;
}

//Funciones

function sumar(primero: number, segundo:number): number{
    return primero + segundo;
}

sumar(1,2);

// no retorna nada
function multiplicar(primero: number, segundo:number): void{
    console.log(primero + segundo);
}

multiplicar(1,2);


//Loops

//for
let animales: string[] = ['perro', 'gato','pato', 'vaca'];

for(let animal of animales){
    console.log(animal);
}

//while

let entero: number = 100;

while(entero <= 1000){
    console.log(entero);
    entero++;
}

//POO

//Clases

//Lo deje en modulos

`https://www.youtube.com/watch?v=9bmd15UgWtM&t=1s&ab_channel=ProgramadorX`