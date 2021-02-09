<template>
  <div ref="editor"></div>
</template>
<style lang="scss">
.ProseMirror {
  @apply min-h-screen shadow-sm p-7;
}

.ProseMirror-focused {
  @apply border-none outline-none;
}
</style>
<script>
import { ref, onMounted } from 'vue';
import { schema } from 'prosemirror-schema-basic';
import { EditorState } from 'prosemirror-state';
import { EditorView } from 'prosemirror-view';
import { keymap } from 'prosemirror-keymap';
import { baseKeymap } from 'prosemirror-commands';

export default {
  setup() {
    const editor = ref(null);
    const menu = ref(menu);

    let state = EditorState.create({ schema, plugins: [keymap(baseKeymap)] });

    onMounted(() => {
      let view = new EditorView(editor.value, {
        state,
        dispatchTransaction(transaction) {
          console.log(
            'Document size went from',
            transaction.before.content.size,
            'to',
            transaction.doc.content.size
          );
          let newState = view.state.apply(transaction);
          console.log("🚀 ~ file: Editor.vue ~ line 39 ~ dispatchTransaction ~ newState", newState);
          view.updateState(newState);
        },
      });
      console.log('🚀 ~ file: Editor.vue ~ line 20 ~ onMounted ~ view', view);
    });

    return {
      editor,
      menu,
    };
  },
};
</script>
