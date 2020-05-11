'use strict';

function fullNameGenerator(firstNmae, lastName) {
    let name = firstNmae;
    let surname = lastName;

    function getFullName() {
        return name + ' ' + surname;
    }

    function changeFirstName(newName) {
        name = newName;
        return name;
    }

    return {getFullName: getFullName, changeFirstName: changeFirstName};
}


const user1 = fullNameGenerator('Domantas', 'Makreckas');
const user2 = fullNameGenerator('Mykolas', 'Becius');


console.log(user1.getFullName());
// console.log(user2());
user1.changeFirstName('marius');
console.log(user1.getFullName());

