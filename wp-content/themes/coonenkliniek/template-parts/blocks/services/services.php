<?php
/**
 * The template part for displaying services block with image
 *
 * @package    WordPress
 * @subpackage Custom_Theme
 * @since      3.4.6
 * @version    3.4.6
 */
// Create id attribute allowing for custom "anchor" value.
$id = 'services+' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'services';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

$title          = get_field('services_title');
$label          = get_field('services_label');
$content        = get_field('services_content');
$margin         = get_field('services_margin_bottom');
$background     = get_field('services_background_color'); ?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> section centered alitce <?php if ($margin) { echo $margin; } ?> <?php if ($background) { echo 'has-bg' . ' ' .  $background; } ?>">
       
        <div class="content">            

            <?php if( $label ) : ?>
                <p class="label"><?php echo $label; ?></p>
            <?php endif; ?>

            <?php if( $title ) : ?>
                <h2><?php echo $title; ?></h2>
            <?php endif; ?>                     

            <?php if( $content ) : ?>
                <?php echo $content; ?>
            <?php endif; ?>

            <!-- /// Behandelingen \\ -->
                <div class="behandelingen">
                    
                    <div class="top grid columns-3">
                        <div class="left">
                            <h3>Botox</h3>
                            <ul>
                                <li>
                                    <a href="#/">Fronsrimpel</a>
                                </li>
                                <li>
                                    <a href="#/">Kraaienpootjes</a>
                                </li>
                                <li>
                                    <a href="#/">Migraine</a>
                                </li>
                                <li>
                                    <a href="#/">Overmatig zweten</a>
                                </li>
                                <li>
                                    <a class="voorhoofdrimpel" href="#/">Voorhoofdrimpel</a>
                                </li>
                                <li>
                                    <a href="#/">Tandenknarsen/ kaakklemmen</a>
                                </li>
                                <li>
                                    <a href="#/">Kin</a>
                                </li>
                                <li>
                                    <a href="#/">Gummy smile</a>
                                </li>
                                <li>
                                    <a href="#/">Liplijntjes</a>
                                </li>
                                <li>
                                    <a href="#/">Mondhoeken</a>
                                </li>
                            </ul>
                        </div>
                        
                        <div class="middle">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/behandelingen.svg" alt="Een overzicht van alle behandelingen">
                            <a class="voorhoofdrimpel" href="#/"></a>
                        </div>
    
                        <div class="right">
                            <h3>Fillers</h3>
                            <ul>
                                <li>
                                    <a href="#/">Kaaklijn</a>
                                </li>
                                <li>
                                    <a href="#/">Jukbeenderen</a>
                                </li>
                                <li>
                                    <a href="#/">Lippen</a>
                                </li>
                                <li>
                                    <a href="#/">Rokerslijnen</a>
                                </li>
                                <li>
                                    <a href="#/">Neus-lippenplooi</a>
                                </li>
                                <li>
                                    <a href="#/">Wallen</a>
                                </li>
                                <li>
                                    <a href="#/">Kin</a>
                                </li>
                                <li>
                                    <a href="#/">Wangen</a>
                                </li>
                                <li>
                                    <a href="#/">Slapen</a>
                                </li>
                                <li>
                                    <a href="#/">Decolleté</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="bottom">
                        <h3>Overig</h3>
                            <ul>
                                <li>
                                    <a href="#/">Skinbooster</a>
                                </li>
                                <li>
                                    <a href="#/">Coolsculpting</a>
                                </li>
                            </ul>
                        
                    </div>
                    
                </div>
            <!-- \\ Behandelingen /// -->

            
                        
        </div>       

</section>