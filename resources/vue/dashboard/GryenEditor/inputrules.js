import {
    inputRules,
    smartQuotes,
    textblockTypeInputRule,
    emDash,
    ellipsis,
    wrappingInputRule,
} from 'prosemirror-inputrules';

// : (NodeType, number) → InputRule
// Given a node type and a maximum level, creates an input rule that
// turns up to that number of `#` characters followed by a space at
// the start of a textblock into a heading whose level corresponds to
// the number of `#` signs.
export function headingRule(nodeType) {
    return textblockTypeInputRule(
        new RegExp('^(#{2,6})\\s$'),
        nodeType,
        (match) => ({ level: match[1].length })
    );
}

// : (NodeType) → InputRule
// Given a code block node type, returns an input rule that turns a
// textblock starting with three backticks into a code block.
export function codeBlockRule(nodeType) {
    return textblockTypeInputRule(/^```$/, nodeType);
}

// : (NodeType) → InputRule
// Given a list node type, returns an input rule that turns a number
// followed by a dot at the start of a textblock into an ordered list.
export function orderedListRule(nodeType) {
    return wrappingInputRule(
        /^(\d+)\.\s$/,
        nodeType,
        (match) => ({ order: +match[1] }),
        (match, node) => node.childCount + node.attrs.order == +match[1]
    );
}

// : (NodeType) → InputRule
// Given a list node type, returns an input rule that turns a bullet
// (dash, plush, or asterisk) at the start of a textblock into a
// bullet list.
export function bulletListRule(nodeType) {
    return wrappingInputRule(/^\s*([-+*])\s$/, nodeType);
}

// : (Schema) → Plugin
// A set of input rules for creating the basic block quotes, lists,
// code blocks, and heading.
export function buildInputRules(schema) {
    let rules = smartQuotes.concat(ellipsis, emDash);
    let type;

    if ((type = schema.nodes.heading)) rules.push(headingRule(type));
    if ((type = schema.nodes.code_block)) rules.push(codeBlockRule(type));
    if ((type = schema.nodes.ordered_list)) rules.push(orderedListRule(type));
    if ((type = schema.nodes.bullet_list)) rules.push(bulletListRule(type));

    return inputRules({ rules });
}
