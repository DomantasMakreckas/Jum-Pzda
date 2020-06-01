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
        $node = renderComponent(nodeName, attributes)
    } else {
        $node = renderElement(nodeName, attributes)
    }
    // console.log(vNode)
    children.forEach(child => mount(child, $node));
    // console.log($node);
    return $node
}

export function renderComponent(Component, props) {
    const componentObject = new Component(props);
    const vNode = componentObject.render();
    const $node = renderNode(vNode);
    componentObject.$node = $node;

    return $node
}

function renderElement(nodeName, attributes) {
    const $node = document.createElement(nodeName);

    // console.log({$node});
    for (let key in attributes) {
        if (typeof attributes[key] === 'string') {
            $node.setAttribute(key, attributes[key])
        } else {
            $node.addEventListener(key, attributes[key])
        }
    }

    return $node;
}

