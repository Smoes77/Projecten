const discord = require("discord.js");


module.exports.run = async (client, message, args) => {

    var botEmbed = new discord.MessageEmbed()
    .setTitle("Guardian Bot")
    .setDescription("Deze bot is gemaakt door Smoes peace out homies")
    .setColor("DARK_GOLD")
    .addField("Bot naam", client.user.username)
    .setThumbnail('https://images.complex.com/complex/images/c_crop,h_1953,w_1920,x_0,y_1/c_fill,dpr_auto,f_auto,q_auto,w_1400/fl_lossy,pg_1/yozzg8urszten6laghpl/polo-g-press-2-daniel-prakopcyk?fimg-ssr')
    .setImage('https://images.complex.com/complex/images/c_crop,h_1953,w_1920,x_0,y_1/c_fill,dpr_auto,f_auto,q_auto,w_1400/fl_lossy,pg_1/yozzg8urszten6laghpl/polo-g-press-2-daniel-prakopcyk?fimg-ssr')
    .setTimestamp()
    .setFooter("Instagram: d_st_d", '');
   
    return message.channel.send({embeds: [botEmbed]});
}

module.exports.help = {
    name: "botinfo",
    category: "info",
    description: "geeft informatie over de bot."
}