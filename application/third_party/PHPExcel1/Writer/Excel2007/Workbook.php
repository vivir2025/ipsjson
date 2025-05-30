<?php

/**
 * PHPExcel1_Writer_Excel2007_Workbook
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
 * @package    PHPExcel1_Writer_Excel2007
 * @copyright  Copyright (c) 2006 - 2015 PHPExcel1 (http://www.codeplex.com/PHPExcel1)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt    LGPL
 * @version    ##VERSION##, ##DATE##
 */
class PHPExcel1_Writer_Excel2007_Workbook extends PHPExcel1_Writer_Excel2007_WriterPart
{
    /**
     * Write workbook to XML format
     *
     * @param     PHPExcel1    $pPHPExcel1
     * @param    boolean        $recalcRequired    Indicate whether formulas should be recalculated before writing
     * @return     string         XML Output
     * @throws     PHPExcel1_Writer_Exception
     */
    public function writeWorkbook(PHPExcel1 $pPHPExcel1 = null, $recalcRequired = false)
    {
        // Create XML writer
        $objWriter = null;
        if ($this->getParentWriter()->getUseDiskCaching()) {
            $objWriter = new PHPExcel1_Shared_XMLWriter(PHPExcel1_Shared_XMLWriter::STORAGE_DISK, $this->getParentWriter()->getDiskCachingDirectory());
        } else {
            $objWriter = new PHPExcel1_Shared_XMLWriter(PHPExcel1_Shared_XMLWriter::STORAGE_MEMORY);
        }

        // XML header
        $objWriter->startDocument('1.0', 'UTF-8', 'yes');

        // workbook
        $objWriter->startElement('workbook');
        $objWriter->writeAttribute('xml:space', 'preserve');
        $objWriter->writeAttribute('xmlns', 'http://schemas.openxmlformats.org/spreadsheetml/2006/main');
        $objWriter->writeAttribute('xmlns:r', 'http://schemas.openxmlformats.org/officeDocument/2006/relationships');

        // fileVersion
        $this->writeFileVersion($objWriter);

        // workbookPr
        $this->writeWorkbookPr($objWriter);

        // workbookProtection
        $this->writeWorkbookProtection($objWriter, $pPHPExcel1);

        // bookViews
        if ($this->getParentWriter()->getOffice2003Compatibility() === false) {
            $this->writeBookViews($objWriter, $pPHPExcel1);
        }

        // sheets
        $this->writeSheets($objWriter, $pPHPExcel1);

        // definedNames
        $this->writeDefinedNames($objWriter, $pPHPExcel1);

        // calcPr
        $this->writeCalcPr($objWriter, $recalcRequired);

        $objWriter->endElement();

        // Return
        return $objWriter->getData();
    }

    /**
     * Write file version
     *
     * @param     PHPExcel1_Shared_XMLWriter $objWriter         XML Writer
     * @throws     PHPExcel1_Writer_Exception
     */
    private function writeFileVersion(PHPExcel1_Shared_XMLWriter $objWriter = null)
    {
        $objWriter->startElement('fileVersion');
        $objWriter->writeAttribute('appName', 'xl');
        $objWriter->writeAttribute('lastEdited', '4');
        $objWriter->writeAttribute('lowestEdited', '4');
        $objWriter->writeAttribute('rupBuild', '4505');
        $objWriter->endElement();
    }

    /**
     * Write WorkbookPr
     *
     * @param     PHPExcel1_Shared_XMLWriter $objWriter         XML Writer
     * @throws     PHPExcel1_Writer_Exception
     */
    private function writeWorkbookPr(PHPExcel1_Shared_XMLWriter $objWriter = null)
    {
        $objWriter->startElement('workbookPr');

        if (PHPExcel1_Shared_Date::getExcelCalendar() == PHPExcel1_Shared_Date::CALENDAR_MAC_1904) {
            $objWriter->writeAttribute('date1904', '1');
        }

        $objWriter->writeAttribute('codeName', 'ThisWorkbook');

        $objWriter->endElement();
    }

    /**
     * Write BookViews
     *
     * @param     PHPExcel1_Shared_XMLWriter     $objWriter         XML Writer
     * @param     PHPExcel1                    $pPHPExcel1
     * @throws     PHPExcel1_Writer_Exception
     */
    private function writeBookViews(PHPExcel1_Shared_XMLWriter $objWriter = null, PHPExcel1 $pPHPExcel1 = null)
    {
        // bookViews
        $objWriter->startElement('bookViews');

        // workbookView
        $objWriter->startElement('workbookView');

        $objWriter->writeAttribute('activeTab', $pPHPExcel1->getActiveSheetIndex());
        $objWriter->writeAttribute('autoFilterDateGrouping', '1');
        $objWriter->writeAttribute('firstSheet', '0');
        $objWriter->writeAttribute('minimized', '0');
        $objWriter->writeAttribute('showHorizontalScroll', '1');
        $objWriter->writeAttribute('showSheetTabs', '1');
        $objWriter->writeAttribute('showVerticalScroll', '1');
        $objWriter->writeAttribute('tabRatio', '600');
        $objWriter->writeAttribute('visibility', 'visible');

        $objWriter->endElement();

        $objWriter->endElement();
    }

    /**
     * Write WorkbookProtection
     *
     * @param     PHPExcel1_Shared_XMLWriter     $objWriter         XML Writer
     * @param     PHPExcel1                    $pPHPExcel1
     * @throws     PHPExcel1_Writer_Exception
     */
    private function writeWorkbookProtection(PHPExcel1_Shared_XMLWriter $objWriter = null, PHPExcel1 $pPHPExcel1 = null)
    {
        if ($pPHPExcel1->getSecurity()->isSecurityEnabled()) {
            $objWriter->startElement('workbookProtection');
            $objWriter->writeAttribute('lockRevision', ($pPHPExcel1->getSecurity()->getLockRevision() ? 'true' : 'false'));
            $objWriter->writeAttribute('lockStructure', ($pPHPExcel1->getSecurity()->getLockStructure() ? 'true' : 'false'));
            $objWriter->writeAttribute('lockWindows', ($pPHPExcel1->getSecurity()->getLockWindows() ? 'true' : 'false'));

            if ($pPHPExcel1->getSecurity()->getRevisionsPassword() != '') {
                $objWriter->writeAttribute('revisionsPassword', $pPHPExcel1->getSecurity()->getRevisionsPassword());
            }

            if ($pPHPExcel1->getSecurity()->getWorkbookPassword() != '') {
                $objWriter->writeAttribute('workbookPassword', $pPHPExcel1->getSecurity()->getWorkbookPassword());
            }

            $objWriter->endElement();
        }
    }

    /**
     * Write calcPr
     *
     * @param     PHPExcel1_Shared_XMLWriter    $objWriter        XML Writer
     * @param    boolean                        $recalcRequired    Indicate whether formulas should be recalculated before writing
     * @throws     PHPExcel1_Writer_Exception
     */
    private function writeCalcPr(PHPExcel1_Shared_XMLWriter $objWriter = null, $recalcRequired = true)
    {
        $objWriter->startElement('calcPr');

        //    Set the calcid to a higher value than Excel itself will use, otherwise Excel will always recalc
        //  If MS Excel does do a recalc, then users opening a file in MS Excel will be prompted to save on exit
        //     because the file has changed
        $objWriter->writeAttribute('calcId', '999999');
        $objWriter->writeAttribute('calcMode', 'auto');
        //    fullCalcOnLoad isn't needed if we've recalculating for the save
        $objWriter->writeAttribute('calcCompleted', ($recalcRequired) ? 1 : 0);
        $objWriter->writeAttribute('fullCalcOnLoad', ($recalcRequired) ? 0 : 1);

        $objWriter->endElement();
    }

    /**
     * Write sheets
     *
     * @param     PHPExcel1_Shared_XMLWriter     $objWriter         XML Writer
     * @param     PHPExcel1                    $pPHPExcel1
     * @throws     PHPExcel1_Writer_Exception
     */
    private function writeSheets(PHPExcel1_Shared_XMLWriter $objWriter = null, PHPExcel1 $pPHPExcel1 = null)
    {
        // Write sheets
        $objWriter->startElement('sheets');
        $sheetCount = $pPHPExcel1->getSheetCount();
        for ($i = 0; $i < $sheetCount; ++$i) {
            // sheet
            $this->writeSheet(
                $objWriter,
                $pPHPExcel1->getSheet($i)->getTitle(),
                ($i + 1),
                ($i + 1 + 3),
                $pPHPExcel1->getSheet($i)->getSheetState()
            );
        }

        $objWriter->endElement();
    }

    /**
     * Write sheet
     *
     * @param     PHPExcel1_Shared_XMLWriter     $objWriter         XML Writer
     * @param     string                         $pSheetname         Sheet name
     * @param     int                            $pSheetId             Sheet id
     * @param     int                            $pRelId                Relationship ID
     * @param   string                      $sheetState         Sheet state (visible, hidden, veryHidden)
     * @throws     PHPExcel1_Writer_Exception
     */
    private function writeSheet(PHPExcel1_Shared_XMLWriter $objWriter = null, $pSheetname = '', $pSheetId = 1, $pRelId = 1, $sheetState = 'visible')
    {
        if ($pSheetname != '') {
            // Write sheet
            $objWriter->startElement('sheet');
            $objWriter->writeAttribute('name', $pSheetname);
            $objWriter->writeAttribute('sheetId', $pSheetId);
            if ($sheetState != 'visible' && $sheetState != '') {
                $objWriter->writeAttribute('state', $sheetState);
            }
            $objWriter->writeAttribute('r:id', 'rId' . $pRelId);
            $objWriter->endElement();
        } else {
            throw new PHPExcel1_Writer_Exception("Invalid parameters passed.");
        }
    }

    /**
     * Write Defined Names
     *
     * @param     PHPExcel1_Shared_XMLWriter    $objWriter         XML Writer
     * @param     PHPExcel1                    $pPHPExcel1
     * @throws     PHPExcel1_Writer_Exception
     */
    private function writeDefinedNames(PHPExcel1_Shared_XMLWriter $objWriter = null, PHPExcel1 $pPHPExcel1 = null)
    {
        // Write defined names
        $objWriter->startElement('definedNames');

        // Named ranges
        if (count($pPHPExcel1->getNamedRanges()) > 0) {
            // Named ranges
            $this->writeNamedRanges($objWriter, $pPHPExcel1);
        }

        // Other defined names
        $sheetCount = $pPHPExcel1->getSheetCount();
        for ($i = 0; $i < $sheetCount; ++$i) {
            // definedName for autoFilter
            $this->writeDefinedNameForAutofilter($objWriter, $pPHPExcel1->getSheet($i), $i);

            // definedName for Print_Titles
            $this->writeDefinedNameForPrintTitles($objWriter, $pPHPExcel1->getSheet($i), $i);

            // definedName for Print_Area
            $this->writeDefinedNameForPrintArea($objWriter, $pPHPExcel1->getSheet($i), $i);
        }

        $objWriter->endElement();
    }

    /**
     * Write named ranges
     *
     * @param     PHPExcel1_Shared_XMLWriter    $objWriter         XML Writer
     * @param     PHPExcel1                    $pPHPExcel1
     * @throws     PHPExcel1_Writer_Exception
     */
    private function writeNamedRanges(PHPExcel1_Shared_XMLWriter $objWriter = null, PHPExcel1 $pPHPExcel1)
    {
        // Loop named ranges
        $namedRanges = $pPHPExcel1->getNamedRanges();
        foreach ($namedRanges as $namedRange) {
            $this->writeDefinedNameForNamedRange($objWriter, $namedRange);
        }
    }

    /**
     * Write Defined Name for named range
     *
     * @param     PHPExcel1_Shared_XMLWriter    $objWriter         XML Writer
     * @param     PHPExcel1_NamedRange            $pNamedRange
     * @throws     PHPExcel1_Writer_Exception
     */
    private function writeDefinedNameForNamedRange(PHPExcel1_Shared_XMLWriter $objWriter = null, PHPExcel1_NamedRange $pNamedRange)
    {
        // definedName for named range
        $objWriter->startElement('definedName');
        $objWriter->writeAttribute('name', $pNamedRange->getName());
        if ($pNamedRange->getLocalOnly()) {
            $objWriter->writeAttribute('localSheetId', $pNamedRange->getScope()->getParent()->getIndex($pNamedRange->getScope()));
        }

        // Create absolute coordinate and write as raw text
        $range = PHPExcel1_Cell::splitRange($pNamedRange->getRange());
        for ($i = 0; $i < count($range); $i++) {
            $range[$i][0] = '\'' . str_replace("'", "''", $pNamedRange->getWorksheet()->getTitle()) . '\'!' . PHPExcel1_Cell::absoluteReference($range[$i][0]);
            if (isset($range[$i][1])) {
                $range[$i][1] = PHPExcel1_Cell::absoluteReference($range[$i][1]);
            }
        }
        $range = PHPExcel1_Cell::buildRange($range);

        $objWriter->writeRawData($range);

        $objWriter->endElement();
    }

    /**
     * Write Defined Name for autoFilter
     *
     * @param     PHPExcel1_Shared_XMLWriter    $objWriter         XML Writer
     * @param     PHPExcel1_Worksheet            $pSheet
     * @param     int                            $pSheetId
     * @throws     PHPExcel1_Writer_Exception
     */
    private function writeDefinedNameForAutofilter(PHPExcel1_Shared_XMLWriter $objWriter = null, PHPExcel1_Worksheet $pSheet = null, $pSheetId = 0)
    {
        // definedName for autoFilter
        $autoFilterRange = $pSheet->getAutoFilter()->getRange();
        if (!empty($autoFilterRange)) {
            $objWriter->startElement('definedName');
            $objWriter->writeAttribute('name', '_xlnm._FilterDatabase');
            $objWriter->writeAttribute('localSheetId', $pSheetId);
            $objWriter->writeAttribute('hidden', '1');

            // Create absolute coordinate and write as raw text
            $range = PHPExcel1_Cell::splitRange($autoFilterRange);
            $range = $range[0];
            //    Strip any worksheet ref so we can make the cell ref absolute
            if (strpos($range[0], '!') !== false) {
                list($ws, $range[0]) = explode('!', $range[0]);
            }

            $range[0] = PHPExcel1_Cell::absoluteCoordinate($range[0]);
            $range[1] = PHPExcel1_Cell::absoluteCoordinate($range[1]);
            $range = implode(':', $range);

            $objWriter->writeRawData('\'' . str_replace("'", "''", $pSheet->getTitle()) . '\'!' . $range);

            $objWriter->endElement();
        }
    }

    /**
     * Write Defined Name for PrintTitles
     *
     * @param     PHPExcel1_Shared_XMLWriter    $objWriter         XML Writer
     * @param     PHPExcel1_Worksheet            $pSheet
     * @param     int                            $pSheetId
     * @throws     PHPExcel1_Writer_Exception
     */
    private function writeDefinedNameForPrintTitles(PHPExcel1_Shared_XMLWriter $objWriter = null, PHPExcel1_Worksheet $pSheet = null, $pSheetId = 0)
    {
        // definedName for PrintTitles
        if ($pSheet->getPageSetup()->isColumnsToRepeatAtLeftSet() || $pSheet->getPageSetup()->isRowsToRepeatAtTopSet()) {
            $objWriter->startElement('definedName');
            $objWriter->writeAttribute('name', '_xlnm.Print_Titles');
            $objWriter->writeAttribute('localSheetId', $pSheetId);

            // Setting string
            $settingString = '';

            // Columns to repeat
            if ($pSheet->getPageSetup()->isColumnsToRepeatAtLeftSet()) {
                $repeat = $pSheet->getPageSetup()->getColumnsToRepeatAtLeft();

                $settingString .= '\'' . str_replace("'", "''", $pSheet->getTitle()) . '\'!$' . $repeat[0] . ':$' . $repeat[1];
            }

            // Rows to repeat
            if ($pSheet->getPageSetup()->isRowsToRepeatAtTopSet()) {
                if ($pSheet->getPageSetup()->isColumnsToRepeatAtLeftSet()) {
                    $settingString .= ',';
                }

                $repeat = $pSheet->getPageSetup()->getRowsToRepeatAtTop();

                $settingString .= '\'' . str_replace("'", "''", $pSheet->getTitle()) . '\'!$' . $repeat[0] . ':$' . $repeat[1];
            }

            $objWriter->writeRawData($settingString);

            $objWriter->endElement();
        }
    }

    /**
     * Write Defined Name for PrintTitles
     *
     * @param     PHPExcel1_Shared_XMLWriter    $objWriter         XML Writer
     * @param     PHPExcel1_Worksheet            $pSheet
     * @param     int                            $pSheetId
     * @throws     PHPExcel1_Writer_Exception
     */
    private function writeDefinedNameForPrintArea(PHPExcel1_Shared_XMLWriter $objWriter = null, PHPExcel1_Worksheet $pSheet = null, $pSheetId = 0)
    {
        // definedName for PrintArea
        if ($pSheet->getPageSetup()->isPrintAreaSet()) {
            $objWriter->startElement('definedName');
            $objWriter->writeAttribute('name', '_xlnm.Print_Area');
            $objWriter->writeAttribute('localSheetId', $pSheetId);

            // Setting string
            $settingString = '';

            // Print area
            $printArea = PHPExcel1_Cell::splitRange($pSheet->getPageSetup()->getPrintArea());

            $chunks = array();
            foreach ($printArea as $printAreaRect) {
                $printAreaRect[0] = PHPExcel1_Cell::absoluteReference($printAreaRect[0]);
                $printAreaRect[1] = PHPExcel1_Cell::absoluteReference($printAreaRect[1]);
                $chunks[] = '\'' . str_replace("'", "''", $pSheet->getTitle()) . '\'!' . implode(':', $printAreaRect);
            }

            $objWriter->writeRawData(implode(',', $chunks));

            $objWriter->endElement();
        }
    }
}
