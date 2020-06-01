import {Component, hyperscript} from "../vdom/bootloader";


export class Button extends Component {
    constructor(props) {
        super(props);
        // console.log(props)
    }

    render() {
        return hyperscript('button', {
                click: this.props.onClick,
                class: this.props.class
            },
            this.props.name
        );
    }
}