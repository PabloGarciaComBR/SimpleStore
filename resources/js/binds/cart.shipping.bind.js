import React from 'react'
import ReactDOM from 'react-dom'
import ComboRegion from '../components/ComboRegion'

var RegionComboComponent = document.getElementById('ss-region-combo')

if (RegionComboComponent) {
  ReactDOM.render(
    <ComboRegion/>,
    RegionComboComponent)
}
