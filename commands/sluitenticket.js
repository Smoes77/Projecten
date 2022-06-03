const discord = require("discord.js");

module.exports.run = async (client, message, args) => {

    const categoryID = "947192038280003625";

    if (!message.member.permissions.has("KICK_MEMBERS")) return message.reply("Je hebt niet de benodigde permissie voor deze command!");

    if(message.channel.parentId == categoryID) {

        message.channel.delete();

        var embedTicket = new discord.MessageEmbed()
        .setTitle("Ticket, " + message.channel.name)
        .setDescription("De ticket is gemarkeerd als **compleet**")
        .setFooter("Ticket gesloten");

        var ticketChannel = message.member.guild.channels.cache.find(channel => channel.name == "log");
        if(!ticketChannel) return message.reply("Kanaal bestaat niet");

        return ticketChannel.send({ embeds: [embedTicket] });

    } else {
      return  message.channel.send("Gebruik deze command in het ticket kanaal.");
    }

}

module.exports.help = {
    name: "close",
    category: "general",
    description: "geeft een leuk bericht terug!"
    
}