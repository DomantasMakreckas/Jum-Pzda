import {Component, hyperscript} from "../vdom/bootloader";

export class Input extends Component {

    constructor(props) {
        super(props);
    }

    render() {
        return hyperscript('input',
            {
                keyup: this.props.handler,
                value: this.props.value,
                class: this.props.class,
                placeholder: this.props.placeholder
            }
        )
    }
}