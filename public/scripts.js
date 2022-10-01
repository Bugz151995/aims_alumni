/**
 * @param int id
 * @param string placeHolderText
 * @param string strArray
 * 
 * @return [type]
 */
 function autocompleteInit(id, placeHolderText, array) {
    const autoCompleteJS = new autoComplete({
        selector: id,
        placeHolder: placeHolderText,
        data: {
            src: array,
            cache: true,
        },
        resultsList: {
            element: (list, data) => {
                if (!data.results.length) {
                    // Create "No Results" message element
                    const message = document.createElement("div");
                    // Add class to the created element
                    message.setAttribute("class", "no_result");
                    // Add message text content
                    message.innerHTML = `<span>Found No Results for "${data.query}"</span>`;
                    // Append message element to the results list
                    list.prepend(message);
                }
            },
            noResults: true,
        },
        resultItem: {
            highlight: true,
        },
        events: {
            input: {
                selection: (event) => {
                    const selection = event.detail.selection.value;
                    autoCompleteJS.input.value = selection;
                }
            }
        }
    });
}