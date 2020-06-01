'use strict';
import {updateComponent} from "./updateComponent";

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
        };

        updateComponent(this);
    }
}