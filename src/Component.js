'use strict';

export class Component {
    constructor(props) {
        this.$node = null;
        this.props = props;
        this.state = {};
    }

    setState(state) {
        this.state = {
            ...this.state,
            ...state
        }
    }


}