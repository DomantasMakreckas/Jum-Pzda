'use strict';

/**
 * prijungia node prie esame tevo
 */
import {renderNode} from "./renderNode";

export function mount(vNode, parent) {
    parent.append(renderNode(vNode));
}