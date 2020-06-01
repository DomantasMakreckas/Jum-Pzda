import {hyperscript, Component} from "../vdom/bootloader";
import {Input} from "./Input";
import {Button} from "./Button";

export class Main extends Component {
    constructor(props) {
        super(props);
        this.state.todos = [
            {
                title: 'cia pirma pastraipa',
                body: 'pirmos pastraipos tekstas'
            },
            {
                title: 'antra pastraipa',
                body: 'antros pastraipos'
            },
            {
                title: 'trecia pastraipa',
                body: 'trecios pastraipos tekstas'
            },
            {
                title: 'bybys',
                body: 'kiausai'
            }
        ];
        this.state.post = {
            title: '',
            body: ''
        };
        this.newPost = this.newPost.bind(this);
        this.getTitle = this.getTitle.bind(this);
        this.getBody = this.getBody.bind(this);
        this.handleSubmit = this.handleSubmit.bind(this);
        console.log({key: this.handleSubmit})
    }

    newPost() {
        let updatedTodo = this.state.todos;
        updatedTodo.push(this.state.post);
        this.setState({post: updatedTodo})
    }

    getTitle(e) {
        this.state.post.title = e.target.value;
    }

    getBody(e) {
        this.state.post.body = e.target.value;
    }

    handleSubmit(e) {
        e.preventDefault();
        this.newPost()
    }

    render() {
        const array = this.state.todos.map(todo => {
            return hyperscript('article', {},

                hyperscript('h2', {}, todo.title,),
                hyperscript('p', {}, todo.body)
            )
        });

        return hyperscript('div', {},
            ...array,
            hyperscript('form',
                {submit: this.handleSubmit},
                hyperscript('h4', {}, 'Pasismagink'),
                hyperscript(Input,
                    {class: 'first-input', placeholder: 'Title', handler: this.getTitle},
                ),
                hyperscript(Input,
                    {class: 'second-input', placeholder: 'New post...', handler: this.getBody}
                ),
                hyperscript(Button, {class: 'button', name: 'Smagintis'})
            ))
    }
}