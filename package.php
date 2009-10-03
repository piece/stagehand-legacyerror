<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */

/**
 * PHP version 5
 *
 * Copyright (c) 2009 KUBO Atsuhiro <kubo@iteman.jp>,
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *
 *     * Redistributions of source code must retain the above copyright
 *       notice, this list of conditions and the following disclaimer.
 *     * Redistributions in binary form must reproduce the above copyright
 *       notice, this list of conditions and the following disclaimer in the
 *       documentation and/or other materials provided with the distribution.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE
 * LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @package    Stagehand_LegacyError
 * @copyright  2009 KUBO Atsuhiro <kubo@iteman.jp>
 * @license    http://www.opensource.org/licenses/bsd-license.php  New BSD License
 * @version    Release: @package_version@
 * @since      File available since Release 0.1.0
 */

require_once 'PEAR/PackageFileManager2.php';
require_once 'PEAR.php';

PEAR::staticPushErrorHandling(PEAR_ERROR_CALLBACK, create_function('$error', 'var_dump($error); exit();'));

$releaseVersion = '0.3.1';
$releaseStability = 'beta';
$apiVersion = '0.3.0';
$apiStability = 'beta';
$notes = 'What\'s New in Stagehand_LegacyError 0.3.1

 Two defect fixes.

  * A defect has been fixed so that Stagehand_LegacyError_PHPError causes an exception to be raised when an unrelated error is raised.
  * A defect has been fixed so that Stagehand_LegacyError_PEARErrorStack causes a "Strict Standards" error to be raised.';

$package = new PEAR_PackageFileManager2();
$package->setOptions(array('filelistgenerator' => 'file',
                           'changelogoldtonew' => false,
                           'simpleoutput'      => true,
                           'baseinstalldir'    => '/',
                           'packagefile'       => 'package.xml',
                           'packagedirectory'  => '.',
                           'dir_roles'         => array('doc' => 'doc',
                                                        'src' => 'php',
                                                        'tests' => 'test'),
                           'ignore'            => array('package.php'))
                     );

$package->setPackage('Stagehand_LegacyError');
$package->setPackageType('php');
$package->setSummary('A utility to convert some types of errors to exceptions');
$package->setDescription('Stagehand_LegacyError is a package that can be used to convert some types of errors to exceptions automatically. The following types of errors are supported:

 * PEAR_Error
 * PEAR_ErrorStack
 * PHP errors which can be processed by a user-defined error handler

Auto conversion can be enabled for each type of errors. If auto conversion is enabled, an error will be converted to an exception by the appropriate error handler when the error is raised. And also exception objects raised by conversion are instances of a class which implements the Stagehand_LegacyError_Exception interface.');
$package->setChannel('pear.piece-framework.com');
$package->setLicense('New BSD License', 'http://www.opensource.org/licenses/bsd-license.php');
$package->setAPIVersion($apiVersion);
$package->setAPIStability($apiStability);
$package->setReleaseVersion($releaseVersion);
$package->setReleaseStability($releaseStability);
$package->setNotes($notes);
$package->setPhpDep('5.1.0');   // ErrorException (PHP 5 >= 5.1.0)
$package->setPearinstallerDep('1.4.3');
$package->addPackageDepWithChannel('required', 'Stagehand_Autoload', 'pear.piece-framework.com', '0.3.0');
$package->addMaintainer('lead', 'iteman', 'KUBO Atsuhiro', 'kubo@iteman.jp');
$package->addGlobalReplacement('package-info', '@package_version@', 'version');
$package->generateContents();

if (array_key_exists(1, $_SERVER['argv']) && $_SERVER['argv'][1] == 'make') {
    $package->writePackageFile();
} else {
    $package->debugPackageFile();
}

exit();

/*
 * Local Variables:
 * mode: php
 * coding: iso-8859-1
 * tab-width: 4
 * c-basic-offset: 4
 * c-hanging-comment-ender-p: nil
 * indent-tabs-mode: nil
 * End:
 */
