app.component("mc-icon", {
    template: $TEMPLATES["mc-icon"],

    setup() {
        // os textos estão localizados no arquivo texts.php deste componente
        const text = Utils.getTexts("mc-icon");
        return { text };
    },

    props: {
        entity: {
            type: [Entity, Object],
            required: false,
        },

        name: {
            type: String,
            required: false,
        },

        isLink: {
            type: Boolean,
            default: false,
        },

        /**
         * @todo implementar outras propriedades do componente iconify
         * https://docs.iconify.design/icon-components/vue/#properties
         */
    },

    data() {
        return {};
    },

    computed: {
        icon() {
            const iconset = $MAPAS.config.iconset;
            if (this.entity) {
                const e = this.entity;
                return (
                    iconset[
                        `${e.__objectType || e["@entityType"]}-${e.type?.id || e.type}`
                    ] ||
                    iconset[e.__objectType] ||
                    iconset[e["@entityType"]] ||
                    iconset[e.__objectId]
                );
            } else {
                return iconset[this.name];
            }
        },

        src() {
            const icons = $MAPAS.config.iconsUrl;

            if (icons[this.name]) return icons[this.name];
            if (this.entity) {
                const e = this.entity;
                return (
                    icons[`${e.__objectType}-${e.type?.id || e.type}`] ||
                    icons[e.__objectType] ||
                    icons[e.__objectId]
                );
            }
            return "";
        },

        own() {
            const icons = $MAPAS.config.iconsUrl;

            if (icons[this.name]) return "true";
            if (this.entity) {
                const e = this.entity;
                if (
                    icons[`${e.__objectType}-${e.type?.id || e.type}`] ||
                    icons[e.__objectType] ||
                    icons[e.__objectId]
                )
                    return "true";
            }
            return `false`;
        },

        alt() {
            if (this.entity) {
                const e = this.entity;
                const icons = $MAPAS.config.iconsUrl;
                if (icons[`${e.__objectType}-${e.type?.id || e.type}`])
                    return `${e.__objectType}-${e.type?.id || e.type} Icon`;
                if (icons[e.__objectType]) return `${e.__objectType} Icon`;
                if (icons[e.__objectId]) return `${e.__objectId} Icon`;
            }
            return `${this.name} Icon`;
        },
    },

    methods: {},
});
