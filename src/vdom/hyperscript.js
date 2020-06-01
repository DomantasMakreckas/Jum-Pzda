'use strict';


/**
 * atiduoda objekta su nodeName atributais ir vaikais
 * @param nodeName
 * @param attributes
 * @param children
 * @returns {{nodeName: *, children: *[], attributes}}
 */
export function hyperscript(nodeName, attributes = {}, ...children) {
    return {nodeName, attributes, children}
}
