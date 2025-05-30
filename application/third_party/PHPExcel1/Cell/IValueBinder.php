<?php

/**
 * PHPExcel1
 *
 * Copyright (c) 2006 - 2015 PHPExcel1
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel1
 * @package    PHPExcel1_Cell
 * @copyright  Copyright (c) 2006 - 2015 PHPExcel1 (http://www.codeplex.com/PHPExcel1)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt    LGPL
 * @version    ##VERSION##, ##DATE##
 */


/**
 * PHPExcel1_Cell_IValueBinder
 *
 * @category   PHPExcel1
 * @package    PHPExcel1_Cell
 * @copyright  Copyright (c) 2006 - 2015 PHPExcel1 (http://www.codeplex.com/PHPExcel1)
 */
interface PHPExcel1_Cell_IValueBinder
{
    /**
     * Bind value to a cell
     *
     * @param  PHPExcel1_Cell $cell    Cell to bind value to
     * @param  mixed $value           Value to bind in cell
     * @return boolean
     */
    public function bindValue(PHPExcel1_Cell $cell, $value = null);
}
