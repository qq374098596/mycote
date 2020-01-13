<?php
namespace qq374098596\mycote;
use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;
use Composer\Repository\InstalledRepositoryInterface;

class PluginInstaller extends LibraryInstaller
{
    public function install(InstalledRepositoryInterface $repo, PackageInterface $package)
    {
        parent::install($repo, $package);
        // $this->filesystem->copyThenRemove('./data/', './');
        $this->filesystem->copyThenRemove("./thinkphp/", './think/thinkphp/');
    }

    /**
     * {@inheritDoc}
     */
    public function getInstallPath(PackageInterface $package)
    {
        // $package->getPrettyName() 包的名字
        $prefix = $package->getPrettyName();
        
        if ('topthink/think' !== $prefix) {
            throw new \InvalidArgumentException(
                'Unable to install template, phpdocumentor templates '
                .'should always start their package name with '
                .'"phpdocumentor/template-"'
            );
        }
       // 返回指定路径
        return '/think/';
        // return './think/'.substr($package->getPrettyName(), 23);
        // return './think/' . $package->getPrettyName();
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