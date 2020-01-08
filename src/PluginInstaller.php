<?php
namespace qq374098596\mycote;
use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;
class PluginInstaller extends LibraryInstaller
{
    /**
     * {@inheritDoc}
     */
    public function getInstallPath(PackageInterface $package)
    {
        // $package->getPrettyName() 包的名字
        $prefix = substr($package->getPrettyName(), 0, 23);
        
        if ('topthink/think' !== $prefix) {
            throw new \InvalidArgumentException(
                'Unable to install template, phpdocumentor templates '
                .'should always start their package name with '
                .'"phpdocumentor/template-"'
            );
        }
       // 返回指定路径
        return './data/'.substr($package->getPrettyName(), 23);
    }
    /**
     * {@inheritDoc}
     */
    public function supports($packageType)
    {
       
        return 'project' === $packageType;
    }
}
?>