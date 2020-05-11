'use strict';
const input = document.querySelector('input[name=name]');
const ul = document.querySelector('ul');
const edit = document.querySelector('input[name=edit]');
input.addEventListener('keyup', onKey);

function onKey(event) {
    const value = event.target.value;

    if (event.keyCode === 13 && event.target.value.trim()) {
        const li = createListElement(value);
        input.value = '';
        ul.appendChild(li);
    }
}

function createListElement(value) {
    const li = document.createElement('li');
    const text = document.createTextNode(value);
    li.appendChild(text);
    ul.appendChild(li);
    const deleteButton = createButton('Delete', deleteItem);
    li.appendChild(deleteButton);
    const editItemButton = createButton('Edit', editItem);
    li.appendChild(editItemButton);

    return li;
}

function createButton(text, handler) {
    const Button = document.createElement('button');
    const buttonValue = document.createTextNode(text);
    Button.appendChild(buttonValue);
    Button.addEventListener('click', handler);

    return Button
}

function deleteItem(event) {
    let liEl = event.target.closest('li');

    function deleteElement() {
        liEl.remove();
    }

    setTimeout(deleteElement, 3000);
    liEl.style.transform = 'translateX(800px)';
    liEl.style.opacity = '0';
    liEl.style.transition = '1.2s';
}

function editItem(event) {
    edit.style.display = 'block';
    const editText = event.target.closest('li').firstChild;
    edit.focus();
    edit.value = editText.textContent;
    edit.select();

    function getEditInput(event) {
        if (event.keyCode === 13 && event.target.value.trim()) {
            editText.textContent = edit.value;
            edit.value = '';

            edit.removeEventListener('onclick', getEditInput);

            edit.style.display = 'none';
        }
    }

    edit.addEventListener('keyup', getEditInput);
}

// setTimeout();
// setInterval();

