/**
 * @description Alterna a classe "active" no elemento com o id passado por parametro
 * @param {string} id
 * @returns
 * @example <button onclick="toggleActive('navbar')"/>
 */
export const toggleActive = id =>
    document.getElementById(id)?.classList.toggle("active");
