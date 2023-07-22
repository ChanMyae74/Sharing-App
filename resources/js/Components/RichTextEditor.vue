<template>
    <!-- Two-way Data-Binding -->
    <quill-editor
        ref="myQuillEditor"
        v-model="content"
        :options="editorOption"
        @blur="onEditorBlur($event)"
        @focus="onEditorFocus($event)"
        @ready="onEditorReady($event)"
    />

    <!-- Or manually control the data synchronization -->
    <quill-editor
        :content="content"
        :options="editorOption"
        @change="onEditorChange($event)"
    />
</template>

<script>
import Quill from 'quill'
import { quillEditor } from 'vue-quill-editor'
import 'quill/dist/quill.core.css'
import 'quill/dist/quill.snow.css'
import 'quill/dist/quill.bubble.css'

export default {
    components: {
        quillEditor
    }
}
</script>

<style lang="scss" scoped>

</style>
