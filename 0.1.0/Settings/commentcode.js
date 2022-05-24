(() => {
    var e = (() => {
        "use strict";
        return (e) => {
            const n = {
                keyword: [],
                type: ["bool", "byte", "complex64", "complex128", "error", "float32", "float64", "int8", "int16", "int32", "int64", "string", "uint8", "uint16", "uint32", "uint64", "int", "uint", "uintptr", "rune"],
                literal: ["true", "false", "iota", "nil"],
                built_in: ["append", "cap", "close", "complex", "copy", "imag", "len", "make", "new", "panic", "print", "println", "real", "recover", "delete"],
            };
            return {
                name: "e",
                aliases: ["ee"],
                keywords: n,
                illegal: "</",
                contains: [
                    hljs.COMMENT(
                        '/\\*', // begin
                        '\\*/', // end
                        {
                            contains: [{
                                scope: 'doc',
                                begin: '@\\w+'
                            }]
                        }
                    ),
                    e.C_LINE_COMMENT_MODE,
                    e.C_BLOCK_COMMENT_MODE,
                    { className: "string", variants: [e.QUOTE_STRING_MODE, e.APOS_STRING_MODE, { begin: "%", end: " " }] },
                    {
                        className: "number",
                        variants: [{ begin: e.C_NUMBER_RE + "[i]", relevance: 1 }, e.C_NUMBER_MODE],
                    },
                    { begin: /:=/ },
                    { className: "function", beginKeywords: "func", end: "\\s*(\\{|$)", excludeEnd: !0, contains: [e.TITLE_MODE, { className: "params", begin: /\(/, end: /\)/, endsParent: !0, keywords: n, illegal: /["']/ }] },
                ],
            };
        };
    })();
    hljs.registerLanguage("e", e);
})();