'use strict';

import {mount} from "./mount";

/**
 * pagal paduotus parametrus sukuria DOM elementa (uzdeda jam atributus ir iraso textNode)
 * @param vNode
 * @returns {Text|any}
 */
export function renderNode(vNode) {

    if (typeof vNode === 'string') {
        return document.createTextNode(vNode);
    }

    const {nodeName, attributes, children} = vNode;

    let $node;

    if (typeof nodeName === 'function') {
        $node = renderComponent(nodeName)
    } else {
        $node = document.createElement(nodeName);

        for (let key in attributes) {
            $node.setAttribute(key, attributes[key])
        }
    }

    children.forEach(child => mount(child, $node));

    return $node
}

export function renderComponent(Component) {
    const componentObject = new Component();
    const vNode = componentObject.render();
    const $node = renderNode(vNode);
    componentObject.$node = $node;

    return $node
}


