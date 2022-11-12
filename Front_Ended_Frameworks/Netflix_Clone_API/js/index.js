const applicationId = document.querySelector('#loading');
applicationId.innerText = 'loaded';

const initialize = async() => {
    const response = await fetch('https://project-apis.codespace.co.za/api/movies')
    /** the Data from response */
    const dataResponse = response.json()
}

/** @type */