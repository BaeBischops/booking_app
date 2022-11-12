/** 
 * @typedef {object} preview
 * @property {string} id
 * @property {string} title
 * @property {string} description
 * @property {number} seasons
 * @property {string} image
 * @property {string[]} genres
 * @property {string} updated
 */

const listHtml = document.querySelector('#list');

const getData = async () => {
    const response = await fetch('https://podcast-api.netlify.app/showslp');

    if (!response){
        listHtml.innerHTML = 'error';
    }

    /**
     * @type {preview[]}
     */
    const dataRetrieved = await response.json();
    let htmlTag = '';
    for(const {id, title, seasons} of getData) {
        htmlTag = `${htmlTag} <li>
                                <button data-preview-button='${id}'> ${title} </button>
                                <span>(${seasons})</span>
                              </li>`
    }
    listHtml.innerHTML = `<button getData-action='back'> Back </button>
                          <h2>${getData.title}</h2>
                          <ul></ul>`
};