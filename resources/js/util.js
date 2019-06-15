const util = {

  // If necessary, is possible to inject this config after
  locale: 'en-US',
  currency: 'USD',

  /**
   * This method can receipt an amount in float type and return a string in human readable format
   * @param float amount The amount to be formatted
   * @return string The amount in human readable format
   */
  formatCurrency: (amount) => {
    return new Intl.NumberFormat(util.locale, { style: 'currency', currency: util.currency }).format(amount)
  }
}

export default util
