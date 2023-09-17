import IMask from "imask";

export const setPhoneMask = (input) => {
    let phoneMask = IMask(input, {
            mask: 'code' + '(000)000-00-00',
            blocks: {
                code: {
                    mask: IMask.MaskedRange,
                    from: 7,
                    to: 8
                }
            }
        });
}