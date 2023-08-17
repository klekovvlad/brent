export const MapEl = () => {
    const mapInner = document.querySelector('.map-inner');

    if(mapInner) {
        mapInner.onclick = () => {
            if(mapInner.dataset.iframe) {
                mapInner.innerHTML = '';
                const iframe = document.createElement('iframe');
                iframe.src = mapInner.dataset.iframe;
                mapInner.append(iframe)
            }
        }
    }
}