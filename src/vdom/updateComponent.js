import {renderNode} from "./renderNode";

export function updateComponent(component) {
    // const $oldnode = component.$node;
    const vNode = component.render();
    const $newNode = renderNode(vNode);

    component.$node.replaceWith($newNode);
    component.$node = $newNode;
}