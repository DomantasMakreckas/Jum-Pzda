// import {hyperscript} from "./bootloader";

import {Component, hyperscript} from "../vdom/bootloader";
import {Button} from "./Button";
import {Input} from "./Input";

export class ListItem extends Component {
    constructor(props) {
        super(props);
        this.handleDelete = this.handleDelete.bind(this);
        this.handleEdit = this.handleEdit.bind(this);
        this.handleEnter = this.handleEnter.bind(this);
    }

    handleDelete() {
        this.props.handler(this.props.key)
    }

    handleEdit() {
        this.props.edit(this.props.key);

    }

    handleEnter(e) {
        if (e.keyCode === 13) {
            this.props.onUpdate(this.props.key, e.target.value);
        }
    }


    render() {
        return hyperscript('li',
            {class: 'list-item'},
            hyperscript(Input,
                {
                    value: this.props.todo,
                    handler: this.handleEnter,
                    class: 'input'
                },
                this.props.todo),
            hyperscript(Button,
                {
                    name: 'delete',
                    class: 'delete',
                    onClick: this.handleDelete
                }),
            hyperscript(Button,
                {
                    name: 'Edit',
                    onClick: this.handleEdit,
                    class: 'edit'
                })
        )
    }
}