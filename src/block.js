wp.blocks.registerBlockType('my-plugin/my-block', {
    title: 'Hello World',
    icon: 'smiley',
    category: 'text',
    attributes: {
        content: {
            type: 'string',
            source: 'html',
            selector: 'p',
        },
    },
    edit: function (props) {
        var content = props.attributes.content;

        function onChangeContent(newContent) {
            props.setAttributes({ content: newContent });
        }

        return wp.element.createElement(
            wp.blockEditor.RichText,
            {
                tagName: 'p',
                className: props.className,
                value: content,
                onChange: onChangeContent,
                placeholder: 'Hello World'
            }
        );
    },
    save: function (props) {
        return wp.element.createElement(
            wp.blockEditor.RichText.Content,
            {
                tagName: 'p',
                value: props.attributes.content,
            }
        );
    },
});
