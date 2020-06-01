import {Component, hyperscript} from "../vdom/bootloader";
import {Button} from "./Button";
import {Input} from "./Input";
import {ListItem} from "./ListItem";


export class App extends Component {
    constructor() {
        super();
        this.state.todos = ['Čiulpiu'];
        this.handleInput = this.handleInput.bind(this);
        this.handleClick = this.handleClick.bind(this);
        this.deleteItem = this.deleteItem.bind(this);
        this.editItem = this.editItem.bind(this);
        this.updateItem = this.updateItem.bind(this);
    }

    handleInput(e) {
        if (e.keyCode === 13) {
            const updatedTodo = this.state.todos;
            updatedTodo.push(e.target.value);
            this.setState({todos: updatedTodo});
            this.deleteItem = this.deleteItem.bind(this);
        }
    }

    handleClick(id) {
        console.log(id);
        const updatedTodo = this.state.todos;
        updatedTodo.splice(id, 1);
        this.setState({todos: updatedTodo});
    }

    deleteItem(id) {
        const updatedTodo = this.state.todos;
        updatedTodo.splice(id, 1);
        this.setState({todos: updatedTodo})
    }

    editItem(id) {
        const updatedTodo = this.state.todos;
        updatedTodo[id] = 'completed';
        this.setState({todos: updatedTodo})
    }

    updateItem(id, value) {
        const updatedState = this.state.todos;
        updatedState.splice(id, 1, value);
        this.setState({todos: updatedState});
    }

    render() {
        const array = this.state.todos.map((todo, index) => {
            return hyperscript(ListItem,
                {
                    todo: todo,
                    key: index,
                    handler: this.deleteItem,
                    edit: this.editItem,
                    onUpdate: this.updateItem
                }
            )
        });

        // console.log(array)
        return hyperscript(
            'div',
            {
                class: 'container',
                style: 'height: 98vh; border: 1px solid black'
            },
            hyperscript('h1',
                {class: 'bybys'},
                'Čiulpk bybi nauji metai <3'),
            hyperscript(Input,
                {handler: this.handleInput}),
            hyperscript('ul',
                {},
                ...array)
        );
    }
}
