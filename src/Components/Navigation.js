import {hyperscript, Component} from "../vdom/bootloader";

export class Navigation extends Component {
    constructor(props) {
        super(props);
    }

    render() {
        return hyperscript('nav',
            {class: 'navigation'},
            hyperscript('img', {src: 'https://pics.clipartpng.com/White_Face_Mask_PNG_Clipart-3285.png'}),
            hyperscript('ul', {},
                hyperscript('li', {},
                    hyperscript('a', {class: "navigation_a"}, 'Home')
                ),
                hyperscript('li', {},
                    hyperscript('a', {class: "navigation_a"}, 'Login')
                ),
                hyperscript('li', {},
                    hyperscript('a', {class: "navigation_a"}, 'Register')
                )
            ));
    }
}