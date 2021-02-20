<template>
  <div ref="editor" class="flex-grow mt-8"></div>
  <div ref="content"></div>
</template>
<style lang="scss">
.gryen-editor {
  @apply border-none outline-none h-full;
}

.gryen-editor ol,
ul {
  // list-style-type: revert;
  @apply pl-8;
}
</style>
<script>
import { ref, onMounted } from 'vue';
import { schema } from 'prosemirror-schema-basic';
import { EditorState, Plugin } from 'prosemirror-state';
import { EditorView } from 'prosemirror-view';
import { keymap } from 'prosemirror-keymap';
import { baseKeymap } from 'prosemirror-commands';
import { buildInputRules } from './inputrules';
import { buildKeymap } from './keymap';
import { Schema, DOMParser } from 'prosemirror-model';
import { addListNodes } from 'prosemirror-schema-list';

export default {
  setup() {
    const editor = ref(null);
    const content = ref(null);

    const gryenEditorSchema = new Schema({
      nodes: addListNodes(schema.spec.nodes, 'paragraph block*', 'block'),
      marks: schema.spec.marks,
    });

    const plugins = [
      buildInputRules(gryenEditorSchema),
      keymap(buildKeymap(gryenEditorSchema)),
      keymap(baseKeymap),
      new Plugin({
        props: {
          attributes: { class: 'gryen-editor' },
        },
      }),
    ];

    onMounted(() => {
      let state = EditorState.create({
        doc: DOMParser.fromSchema(gryenEditorSchema).parse(content.value),
        plugins,
      });
      let view = new EditorView(editor.value, {
        state,
        dispatchTransaction(transaction) {
          let newState = view.state.apply(transaction);

          // console.log(newState);
          view.updateState(newState);
        },
      });

      editor.value.focus();
    });

    return {
      editor,
      content,
    };
  },
};
</script>
